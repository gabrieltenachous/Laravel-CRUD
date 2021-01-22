<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 

class Input extends Model
{
    public $timestamps = false;
    protected $fillable = ['product_id','after_amount','before_amount','unitary_value','date','total_value'];

    public function product(){
        return $this->belongsTo(Product::class); 
    }
}   
