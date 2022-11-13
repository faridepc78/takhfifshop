<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Services\BasketBuy\BasketBuyService;
use Exception;
use Hashids\Hashids;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $basketBuyService;
    private $productRepository;
    private $hashids;

    public function __construct(BasketBuyService  $basketBuyService,
                                ProductRepository $productRepository,
                                Hashids           $hashids)
    {
        $this->basketBuyService = $basketBuyService;
        $this->productRepository = $productRepository;
        $this->hashids = $hashids;
    }

    public function index()
    {
        return view('site.cart.index');
    }

    public function add($product_id, $value)
    {
        try {
            $product_id = $this->hashids->decode($product_id)[0];
            $value = $this->hashids->decode($value)[0];
            $product = $this->productRepository->findById($product_id);
            $item = [
                'id' => $product->id,
                'route' => $product->path(),
                'name' => $product->name,
                'price' => $product->finalPrice(),
                'image' => $product->image->original,
                'count' => $value,
                'time' => time()
            ];

            $result = $this->basketBuyService::addItem($item);
            if ($result['status'] == 'success') {
                newFeedback('پیام', 'محصول به سبد خرید اضافه شد', 'success');
            } else {
                newFeedback('پیام', 'محصول قبلا به سبد خرید اضافه شده است', 'warning');
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->back();
    }

    public function destroy($product_id)
    {
        try {
            $product_id = $this->hashids->decode($product_id)[0];
            $product = $this->productRepository->findById($product_id);
            $item = [
                'id' => $product->id
            ];
            $result = $this->basketBuyService::deleteItem($item);
            if ($result['status'] == 'success') {
                newFeedback('پیام', 'محصول از سبد خرید حذف شد', 'success');
            } else {
                newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->back();
    }

    public function update(Request $request)
    {
        try {
            foreach ($request->except('_token') as $key => $value) {
                $product_id = $this->hashids->decode($key)[0];
                $product = $this->productRepository->findById($product_id);
                if (filter_var($value, FILTER_VALIDATE_INT)) {
                    if ($value <= $product->count) {
                        $data[] = [
                            'id' => $product->id,
                            'count' => $value
                        ];
                    } else {
                        newFeedback('پیام', 'تعداد محصول سفارشی شما بیشتر از موجودی است', 'error');
                        return redirect()->back();
                    }
                } else {
                    newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
                    return redirect()->back();
                }
            }

            $result = $this->basketBuyService::updateItems($data);

            if ($result['status'] == 'success') {
                newFeedback('پیام', 'سبد خرید با موفقیت بروزرسانی شد', 'success');
            } else {
                newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
            }

        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->back();
    }

    public function addOrUpdate(Request $request)
    {
        try {
            $product_id = $this->hashids->decode($request->get('product_id'))[0];
            $product = $this->productRepository->findById($product_id);

            if (filter_var($request->get('count'), FILTER_VALIDATE_INT)) {
                $item = [
                    'id' => $product->id,
                    'count' => $request->get('count')
                ];

                $result = $this->basketBuyService::updateItem($item);

                if ($result['status'] == 'success') {
                    newFeedback('پیام', 'تعداد محصول در سبد خرید با موفقیت بروزرسانی شد', 'success');
                } elseif ($result['status'] == 'duplicate') {
                    newFeedback('پیام', 'تعداد محصول در سبد خرید تغییری نکرد', 'warning');
                } elseif ($result['status'] == 'noSetItem' || $result['status'] == 'fail') {
                    $this->add($this->hashids->encode($product_id), $this->hashids->encode($request->get('count')));
                }

            } else {
                newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
                return redirect()->back();
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }

        return redirect()->back();
    }
}
