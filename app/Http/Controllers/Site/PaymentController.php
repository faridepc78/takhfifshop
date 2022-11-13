<?php

namespace App\Http\Controllers\Site;

use App\Helpers\EncryptDecrypt;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\PaymentNotification;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use SoapFault;

class PaymentController extends Controller
{
    private $orderRepository;
    private $transactionRepository;
    private $productRepository;
    private $userRepository;

    public function __construct(OrderRepository       $orderRepository,
                                TransactionRepository $transactionRepository,
                                ProductRepository     $productRepository,
                                UserRepository        $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->transactionRepository = $transactionRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }

    public function set_driver($payment)
    {
        config()->set('payment.default', $payment);
    }

    public function check()
    {
        try {
            if (isset($_POST['order_id']) && isset($_POST['payment_token'])) {
                $password = env('PAYMENT_TOKEN');

                $order_id = EncryptDecrypt::my_decrypt($_POST['order_id'], $password);
                $payment_token = EncryptDecrypt::my_decrypt($_POST['payment_token'], $password);
                $user_id = Auth::id();

                if ($payment_token == env('SAMAN_TOKEN')) {
                    $payment = Transaction::T_SAMAN;
                } elseif ($payment_token == env('SEPEHR_TOKEN')) {
                    $payment = Transaction::T_SEPEHR;
                } else {
                    abort('403');
                }

                $this->order_id = $order_id;
                $this->user_id = $user_id;
                $this->payment = $payment;

                $this->set_driver($payment);

            } else {
                abort('403');
            }

            $order_items = $this->orderRepository->getAllItemsByOrderId($this->order_id, true);
            $result = $this->productRepository->checkForTransaction($order_items);
            $status = array_count_values($result);

            if (isset($status['no']) || count($result) != $status['yes']) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    public function choice($order_id)
    {
        try {
            $password = env('PAYMENT_TOKEN');
            $order_id = EncryptDecrypt::my_decrypt($order_id, $password);

            return view('panel.orders.choice', compact('order_id'));
        } catch (Exception $exception) {
            abort(404);
        }
    }

    public function request()
    {
        try {
            $result = $this->check();

            if ($result == true) {

                $invoice = new Invoice();

                $order = $this->orderRepository->findById($this->order_id);

                $invoice->amount(intval($order->price()));
                $payment_id = randomNumbers(10);

                $payment = Payment::callbackUrl(route('payment.verify', ['payment_id' => $payment_id]));

                $payment->purchase($invoice, function ($driver, $transactionId) use ($payment_id, $order, $invoice) {
                    $values =
                        [
                            'payment_id' => $payment_id,
                            'user_id' => $this->user_id,
                            'user_ip' => request()->ip(),
                            'order_id' => $this->order_id,
                            'paid' => intval($order->price()),
                            'status' => Transaction::S_PENDING,
                            'type' => $this->payment,
                            'invoice_details' => $invoice
                        ];

                    $transaction = $this->transactionRepository->create($values);

                    $transaction->transaction_id = $transactionId;
                    $transaction->save();
                });

                return $payment->pay()->render();
            } else {
                return redirect()->route('user.transactions.feedback', 'status=many_count');
            }
        } catch (Exception | PurchaseFailedException | SoapFault $exception) {
            return redirect()->route('user.transactions.feedback', 'status=fail');
        }
    }

    public function verify(Request $request)
    {
        if ($request->missing('payment_id')) {
            return redirect()->route('user.transactions.feedback', 'status=fail');
        }

        $transaction = $this->transactionRepository->findByPaymentId($request->payment_id);
        if (empty($transaction)) {
            return redirect()->route('user.transactions.feedback', 'status=fail');
        }

        $this->set_driver($transaction['type']);

        try {
            $receipt = Payment::amount($transaction->paid)
                ->transactionId($transaction->transaction_id)
                ->verify();

            $transaction->transaction_result = $receipt;
            $transaction->status = Transaction::S_SUCCESS;
            $transaction->save();

            $order = $this->orderRepository->findById($transaction->order_id);
            $order->type = Order::PAID;
            $order->save();

            $order_items = $this->orderRepository->getAllItemsByOrderId($order['id'], true);
            $this->productRepository->updateCount($order_items);
            $this->productRepository->updateSale($order_items);

            $admin = $this->userRepository->getAdmin();

            //Start Notifications

            Auth::user()->notify(new PaymentNotification(Auth::user()->fullName, $order->code,
                $request->payment_id, $transaction->paid, User::USER));

            $admin->notify(new PaymentNotification(Auth::user()->fullName, $order->code,
                $request->payment_id, $transaction->paid, User::ADMIN, $admin->fullName));

            //End Notifications

            return redirect()->route('user.transactions.feedback', 'status=success');
        } catch (Exception | InvalidPaymentException $exception) {
            if ($transaction->type == Transaction::T_SAMAN) {
                $payment_code = 'StateCode';
            } elseif ($transaction->type == Transaction::T_SEPEHR) {
                $payment_code = 'respcode';
            }

            if ($request[$payment_code] == '-1') {
                $transaction->status = Transaction::S_CANCEL;
                $f_status = 'cancel';
            } else {
                $transaction->status = Transaction::S_FAIL;
                $f_status = 'fail';
            }

            $transaction->transaction_result = [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ];

            $transaction->save();

            return redirect()->route('user.transactions.feedback', 'status=' . $f_status);
        }
    }
}
