<?php

use App\Models\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id', 10)->index()->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('user_ip');
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('paid');
            $table->string('transaction_id')->nullable();
            $table->enum('status', Transaction::$statuses);
            $table->enum('type', Transaction::$types);
            $table->text('invoice_details')->nullable();
            $table->text('transaction_result')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
