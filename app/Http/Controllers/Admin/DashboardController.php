<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\StatisticsRepository;

class DashboardController extends Controller
{
    private $statisticsRepository;

    public function __construct(StatisticsRepository $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function index()
    {
        $products = $this->statisticsRepository->getCountProducts();
        $users = $this->statisticsRepository->getCountUsers();
        $posts = $this->statisticsRepository->getCountPosts();
        $orders = $this->statisticsRepository->getCountOrders();
        return view('admin.dashboard.index', compact('products', 'users',
            'posts', 'orders'));
    }
}
