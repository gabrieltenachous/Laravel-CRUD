<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produtos; 

class ProdutoController extends Controller
{
    public function list()
    {
        $produto = Produtos::all();
        return view('produto.list', ['produto' => $produto]);
    }
}
