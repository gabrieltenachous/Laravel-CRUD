<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produtos extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [

        'name',
        'quantidade',
        'preco',
        'marca',
    ];
}
