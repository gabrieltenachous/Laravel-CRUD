<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class SaleProductController extends Controller
{
    public function create()
    {
        return view('sale.create');
    }
    public function store(Request $request)
    {
        SaleProduct::create([
            'sale_id' => $request->sale_id,
            'unitary_value' => $request->unitary_value,
            'after_amount' => $request->after_amount,
            'total_value' => $request->total_value,
            'product_id' => $request->product_id,

        ]);
        return "Criado com sucesso  <a href='./list'>Voltar para Lista</a>";
    }

    public function update(Request $request, $id)
    {
        $produtos = SaleProduct::findOrFail($id);
        try {

            $produtos->update(
                [
                    'sale_id' => $request->sale_id,
                    'unitary_value' => $request->unitary_value,
                    'after_amount' => $request->after_amount,
                    'total_value' => $request->total_value,
                    'product_id' => $request->product_id,
                ]
            );
        } catch (QueryException $th) {
            return "Erro inesperado";
        }
        return "Edição por ID com sucesso  <a href='/users/list'>Voltar para Lista</a>";
    }
    public function list()
    {
        $sale = SaleProduct::all();
        return view('sale.lista', ['produtos' => $sale]);
    }

    public function edit($id, Request $request)
    {
        $sale = SaleProduct::findOrFail($id);
        return view('sale.edit', ['user' => $sale]);
    }
    public function deletar($id)
    {
        $sale = SaleProduct::findOrFail($id);
        return View('sale.deletar', ['user' => $sale]);
    }
    public function destroy($id)
    {
        $sale = SaleProduct::findOrFail($id);
        $sale->delete();
        return "Produtos Excluido <a href='/users/list'>Voltar para Lista</a>";
    }
    public function show($id)
    {
        $sale = SaleProduct::findOrFail($id);
        return view('sale.show', ['user' => $sale]);
    }
}
