<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sale extends Migration
{

    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->id('id');
            $table->date('date')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->double('total_value')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('sale');
    }
}
