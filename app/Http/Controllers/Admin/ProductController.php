<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name, 
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'marca' => $request->marca,
        ]);
        return "Criado com sucesso  <a href='./list'>Voltar para Lista</a>";
    }

    public function update(Request $request, $id)
    {
        $produtos = Product::findOrFail($id);
        try {

            $produtos->update(
                [
                    'name' => $request->name, 
                    'quantidade' => $request->quantidade,
                    'preco' => $request->preco,
                    'marca' => $request->marca,
                ]
            );
        } catch (QueryException $th) {
            return "Erro inesperado";
        }
        return "Edição por ID com sucesso  <a href='/users/list'>Voltar para Lista</a>";
    }
    public function list()
    {
        $produto = Product::all();
        return view('product.lista', ['produtos' => $produto]);
    }

    public function edit($id, Request $request)
    {
        $produto = Product::findOrFail($id);
        return view('product.edit', ['user' => $produto]);
    }
    public function deletar($id)
    {
        $produto = Product::findOrFail($id);
        return View('product.deletar', ['user' => $produto]);
    }
    public function destroy($id)
    {
        $produto = Product::findOrFail($id);
        $produto->delete();
        return "Produtos Excluido <a href='/users/list'>Voltar para Lista</a>";
    }
    public function show($id)
    {
        $produto = Product::findOrFail($id);
        return view('product.show', ['user' => $produto]);
    }
}
