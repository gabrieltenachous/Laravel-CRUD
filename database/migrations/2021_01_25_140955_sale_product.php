<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaleProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_product', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('product_id')->constrained();
            $table->foreignId('sale_id')->constrained();
            $table->integer('after_amount')->nullable();
            $table->integer('before_amount')->nullable();
            $table->double('unitary_value')->nullable();
            $table->double('total_value')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('sale_product');
    }
}
