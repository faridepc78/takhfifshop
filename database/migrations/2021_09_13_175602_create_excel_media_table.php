<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excel_media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->timestamps();

            $table->foreign('media_id')
                ->references('id')
                ->on('media')
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
        Schema::dropIfExists('excel_media');
    }
}
