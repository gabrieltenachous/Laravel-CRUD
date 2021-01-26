<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'amount', 'unitary_value'];

    public function inputs()
    {
        return $this->hasMany(Input::class);
    }

    public function saleproducts()
    {
        return $this->hasMany(SaleProduct::class);
    }
}
