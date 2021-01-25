<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    public $timestamps = false;
    protected $fillable = ['product_id','sale_id','after_amount','before_amount','unitary_value','total_value'];
 
    
}
