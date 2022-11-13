<?php

namespace App\Repositories;

use App\Filters\Transaction\Date;
use App\Filters\Transaction\Status;
use App\Filters\Transaction\Token;
use App\Models\Transaction;
use Illuminate\Pipeline\Pipeline;

class TransactionRepository
{
    public function paginateByFilters()
    {
        return app(Pipeline::class)
            ->send(Transaction::query())
            ->through([
                Status::class,
                Date::class,
                Token::class
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function paginateForUserIdByFilters($user_id)
    {
        return app(Pipeline::class)
            ->send(Transaction::query())
            ->through([
                Status::class,
                Date::class,
                Token::class
            ])
            ->thenReturn()
            ->where('user_id', '=', $user_id)
            ->latest()
            ->paginate(10);
    }

    public function create($values)
    {
        return Transaction::query()
            ->create([
                'payment_id' => $values['payment_id'],
                'user_id' => $values['user_id'],
                'user_ip' => $values['user_ip'],
                'order_id' => $values['order_id'],
                'paid' => $values['paid'],
                'status' => $values['status'],
                'type' => $values['type'],
                'invoice_details' => $values['invoice_details']
            ]);
    }

    public function findByPaymentId($payment_id)
    {
        return Transaction::query()
            ->where('payment_id', '=', $payment_id)
            ->first();
    }
}
