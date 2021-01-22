<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; 

class Inputs extends Migration
{ 
    public function up()
    {
        Schema::create('inputs',function(Blueprint $table){
            $table->id('id');
            $table->foreignId('product_id')->constrained();
            $table->integer('after_amount')->nullable();
            $table->integer('before_amount')->nullable();
            $table->integer('amount')->nullable();
            $table->float('unitary_value')->nullable(); 
            $table->date('date')->nullable();
            $table->double('total_value')->nullable();
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
        Schema::drop('inputs');
    }
}
