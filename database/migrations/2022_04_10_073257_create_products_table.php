<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('id_cate');
            $table->string('product_name');
            $table->string('description')->nullable()->default('Tất cả dòng điện thoại');
            $table->string('image');
            $table->integer('price');
            $table->integer('amount');
            $table->integer('view')->nullable()->default(0);
            $table->tinyInteger('status')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
