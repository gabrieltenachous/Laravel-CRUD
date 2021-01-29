<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create()
    {
        return view('sale.create');
    }
    public function store(Request $request)
    {
        Sale::create([
            'date' => $request->date,
            'user_id' => $request->user_id,
            'total_value' => $request->total_value,
        ]);
        return "Criado com sucesso  <a href='./list'>Voltar para Lista</a>";
    }


    public function list()
    {

        $sale = Sale::all();
        return view('sale.listaAll', ['produtos' => $sale]);
    }
    public function list2()
    {

        $sale = Sale::all();
        return view('sale.listaAll', ['produtos' => $sale]);
    }
    public function edit($id, Request $request)
    {
        $sale = Sale::findOrFail($id);
        return view('sale.edit', ['user' => $sale]);
    }
    public function deletar($id)
    {
        $produto = Sale::findOrFail($id);
        return View('sale.deletar', ['user' => $produto]);
    }
    public function destroy($id)
    {
        $produto = Sale::findOrFail($id);
        $produto->delete();
        return "Produtos Excluido <a href='/users/list'>Voltar para Lista</a>";
    }
    public function show($id)
    {
        $produto = Sale::findOrFail($id);
        return view('sale.show', ['user' => $produto]);
    }
}
