<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

class Inputs extends Migration
{ 
    public function up()
    {
        Schema::create('inputs',function(Blueprint $table){
            $table->id('id');
            $table->foreignId('product_id')->constrained();
            $table->date('after_amount');
            $table->date('before_amount');
            $table->float('unitary_value'); 
            $table->date('date');
            $table->double('total_value');
            
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
