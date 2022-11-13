<?php


namespace App\Http\View\Composers;

use App\Services\BasketBuy\BasketBuyService;
use Illuminate\View\View;

class CartComposer
{
    private $basketBuyService;

    public function __construct(BasketBuyService $basketBuyService)
    {
        $this->basketBuyService = $basketBuyService;
    }

    public function compose(View $view)
    {
        $basketBuy_count = $this->basketBuyService::countItems();
        $basketBuy_data = $this->basketBuyService::readData();

        if ($basketBuy_data == false)
            $basketBuy_data = [];

        $view->with([
            'basketBuy_count' => $basketBuy_count,
            'basketBuy_data' => $basketBuy_data
        ]);
    }
}
