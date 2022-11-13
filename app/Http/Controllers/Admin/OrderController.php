<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Notifications\ConfirmOrder;
use App\Repositories\OrderRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function pending()
    {
        $orders = $this->orderRepository->paginatePendingBySearch();
        return view('admin.orders.pending', compact('orders'));
    }

    public function index()
    {
        $orders = $this->orderRepository->paginateByFilters();
        return view('admin.orders.index', compact('orders'));
    }

    public function items($id)
    {
        $order = $this->orderRepository->findById($id);
        $items = $this->orderRepository->getAllItemsByOrderId($id);
        return view('admin.orders.items', compact('order', 'items'));
    }

    public function update_items($id)
    {
        $item = $this->orderRepository->findByItemId($id);
        return view('admin.orders.item', compact('item'));
    }

    public function update_items_do(UpdateOrderItemRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $orderItem = $this->orderRepository->findByItemId($id);
                $this->orderRepository->updateItem($request, $id);
                $this->orderRepository->update($request, $orderItem->order->id);

                if ($orderItem->order['status'] == Order::PENDING) {
                    $this->orderRepository->updateStatus(Order::UPDATED, $orderItem->order['id']);
                }

            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('orders.update_items', $id);
    }

    public function update_items_status(Request $request, $status)
    {
        try {
            if ($request->exists('id')) {
                $ids = $request->id;
                if ($status == OrderItem::AVAILABLE) {
                    foreach ($ids as $id) {
                        $item = $this->orderRepository->findByItemId($id);
                        if ($item['status'] == OrderItem::UNAVAILABLE) {
                            $this->orderRepository->updateStatusOrderItem($id,OrderItem::AVAILABLE);
                        }
                    }
                } elseif ($status == OrderItem::UNAVAILABLE) {
                    foreach ($ids as $id) {
                        $item = $this->orderRepository->findByItemId($id);
                        if ($item['status'] == OrderItem::AVAILABLE) {
                            $this->orderRepository->updateStatusOrderItem($id,OrderItem::UNAVAILABLE);
                        }
                    }
                } else {
                    newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
                }
            } else {
                newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->back();
    }

    public function confirm($id)
    {
        try {
            $order = $this->orderRepository->findById($id);
            if ($order['status'] == Order::PENDING) {
                $this->orderRepository->updateStatus(Order::ACCEPT, $id);
                $order->user->notify(new ConfirmOrder($order->user->fullName, Order::ACCEPT, $order['code']));
            } elseif ($order['status'] == Order::UPDATED) {
                $order->user->notify(new ConfirmOrder($order->user->fullName, Order::UPDATED, $order['code']));
                $this->orderRepository->updateStatus(Order::ACCEPT, $id);
            } else {
                abort(403);
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('orders.pending');
    }
}
