<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        $transactions = $this->transactionRepository->paginateByFilters();
        return view('admin.transactions.index', compact('transactions'));
    }
}
