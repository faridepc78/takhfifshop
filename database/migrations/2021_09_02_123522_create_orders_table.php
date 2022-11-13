<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->longText('address');
            $table->string('phone');
            $table->string('code')->unique();
            $table->longText('message')->nullable();
            $table->enum('status', Order::$statuses)->default(Order::PENDING);
            $table->enum('type', Order::$types)->default(Order::UNPAID);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
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
        Schema::dropIfExists('orders');
    }
}
