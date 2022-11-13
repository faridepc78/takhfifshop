<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->paginateForUserIdByFilters(Auth::id());
        return view('panel.orders.index', compact('orders'));
    }

    public function items($id)
    {
        $order = $this->orderRepository->findById($id);
        $items = $this->orderRepository->getAllItemsByOrderId($id);
        return view('panel.orders.items', compact('order', 'items'));
    }
}
