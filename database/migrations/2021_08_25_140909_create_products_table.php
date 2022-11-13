<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('pdf_id')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('discount')->nullable();
            $table->longText('text');
            $table->unsignedBigInteger('count');
            $table->enum('status', \App\Models\Product::$statuses);
            $table->unsignedBigInteger('sale')->default(0);
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('code')->nullable()->unique();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('image_id')
                ->references('id')
                ->on('media')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('pdf_id')
                ->references('id')
                ->on('media')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
