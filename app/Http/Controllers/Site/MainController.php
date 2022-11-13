<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactUs\ContactUsRequest;
use App\Http\Requests\Site\Inquiry\InquiryRequest;
use App\Http\Requests\Site\Order\OrderRequest;
use App\Models\User;
use App\Notifications\ContactNotification;
use App\Notifications\InquiryNotification;
use App\Notifications\RegisterOrder;
use App\Repositories\BannerRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use App\Repositories\ContactUsRepository;
use App\Repositories\InquiryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProvinceRepository;
use App\Repositories\SliderRepository;
use App\Repositories\UserRepository;
use App\Services\BasketBuy\BasketBuyService;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Amirbagh75\SMSIR\Facades\SMSIR;

class MainController extends Controller
{
    private $sliderRepository;
    private $brandRepository;
    private $bannerRepository;
    private $contactUsRepository;
    private $productRepository;
    private $categoryRepository;
    private $provinceRepository;
    private $cityRepository;
    private $orderRepository;
    private $basketBuyService;
    private $inquiryRepository;
    private $userRepository;

    public function __construct(SliderRepository    $sliderRepository,
                                BrandRepository     $brandRepository,
                                BannerRepository    $bannerRepository,
                                ContactUsRepository $contactUsRepository,
                                ProductRepository   $productRepository,
                                CategoryRepository  $categoryRepository,
                                ProvinceRepository  $provinceRepository,
                                CityRepository      $cityRepository,
                                OrderRepository     $orderRepository,
                                BasketBuyService    $basketBuyService,
                                InquiryRepository   $inquiryRepository,
                                UserRepository      $userRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->brandRepository = $brandRepository;
        $this->bannerRepository = $bannerRepository;
        $this->contactUsRepository = $contactUsRepository;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->provinceRepository = $provinceRepository;
        $this->cityRepository = $cityRepository;
        $this->orderRepository = $orderRepository;
        $this->basketBuyService = $basketBuyService;
        $this->inquiryRepository = $inquiryRepository;
        $this->userRepository = $userRepository;
    }

    public function test()
    {
        $response=SMSIR::send(['this is a test'], ['09162154221']);
        dd($response);
    }

    public function home()
    {
        $sliders = $this->sliderRepository->getAll();
        $brands = $this->brandRepository->getAll();
        $banners = $this->bannerRepository->getAll();
        $new_products = $this->productRepository->new(14);
        $mostSales_products = $this->productRepository->mostSales();
        $discount_products = $this->productRepository->byDiscount();
        $show_categories = $this->categoryRepository->getShow();
        return view('site.home.index',
            compact('sliders', 'brands',
                'banners', 'new_products', 'mostSales_products',
                'discount_products', 'show_categories'));
    }

    public function about_us()
    {
        return view('site.about-us.index');
    }

    public function contact_us()
    {
        $admin = $this->userRepository->getAdmin();
        return view('site.contact-us.index');
    }

    public function contact_us_post(ContactUsRequest $request)
    {
        try {
            $contact = $this->contactUsRepository->store($request);
            $admin = $this->userRepository->getAdmin();
            $admin->notify(new ContactNotification($admin->fullName, $contact['code']));
            newFeedback('پیام', 'پیام شما با موفقیت ارسال شد', 'success');
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('contact-us');
    }

    public function inquiry()
    {
        return view('site.inquiry.index');
    }

    public function inquiry_post(InquiryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $inquiry = $this->inquiryRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('media'),
                    'inquiries', null)->id;
                $this->inquiryRepository->addMedia($image_id, $inquiry->id);
                $admin = $this->userRepository->getAdmin();
                $admin->notify(new InquiryNotification($admin->fullName, $inquiry['code']));
            });
            DB::commit();
            newFeedback('پیام', 'درخواست شما با موفقیت ارسال شد', 'success');
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('inquiry');
    }

    public function faq()
    {
        return view('site.faq.index');
    }

    public function terms_and_conditions()
    {
        return view('site.terms-and-conditions.index');
    }

    public function checkout()
    {
        $count_data = $this->basketBuyService::countItems();
        if ($count_data >= 1) {
            $provinces = $this->provinceRepository->getAll();
            return view('site.checkout.index', compact('provinces'));
        } else {
            newFeedback('پیام', 'شما اجازه دسترسی به این صفحه را ندارید', 'error');
            return redirect()->route('home');
        }
    }

    public function getCities(Request $request)
    {
        try {
            $province_id = $request->get('province_id');
            $cities = $this->cityRepository->findByProvinceId($province_id);
            return response()->json(['cities' => $cities, 'status' => 'success'], Response::HTTP_OK);
        } catch (Exception $exception) {
            return response()->json(['message' => 'عملیات با شکست مواجه شد'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function checkout_post(OrderRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $order = $this->orderRepository->storeOrder($request);

                $data = $this->basketBuyService::readData();

                foreach ($data as $datum) {
                    foreach ($datum as $value) {
                        $array = [
                            'product_id' => $value['id'],
                            'price' => $value['price'],
                            'count' => $value['count']
                        ];
                        $this->orderRepository->storeOrderItem($order['id'], $array);
                    }
                }

                $admin = $this->userRepository->getAdmin();

                Auth::user()->notify(new RegisterOrder(Auth::user()->fullName, $order['code'],
                    User::USER));

                $admin->notify(new RegisterOrder(Auth::user()->fullName, $order['code'],
                    User::ADMIN, $admin->fullName));

                $this->basketBuyService::deleteData();
            });
            DB::commit();
            newFeedback('پیام', 'سفارش شما ثبت شد لطفا برای پرداخت نهایی منتظر تایید مدیریت باشید', 'success');
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('home');
    }
}
