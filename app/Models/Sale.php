<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $timestamps = false;
    protected $fillable = ['date','user_id','total_value']; 

    public function user(){
        return $this->belongsTo(User::class); 
    }
    public function saleprodutcts()
    {
        return $this->hasMany(SaleProduct::class);
    }
}
