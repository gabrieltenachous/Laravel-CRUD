<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductsController extends Controller
{
    public function create()
    {
        return view('produto.create');
    }
    public function store(Request $request)
    {
        Products::create([
            'name' => $request->name, 
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'marca' => $request->marca,
        ]);
        return "Criado com sucesso  <a href='./list'>Voltar para Lista</a>";
    }

    public function update(Request $request, $id)
    {
        $produtos = Products::findOrFail($id);
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
        $produto = Products::all();
        return view('produto.lista', ['produtos' => $produto]);
    }

    public function edit($id, Request $request)
    {
        $produto = Products::findOrFail($id);
        return view('produto.edit', ['user' => $produto]);
    }
    public function deletar($id)
    {
        $produto = Products::findOrFail($id);
        return View('produtos.deletar', ['user' => $produto]);
    }
    public function destroy($id)
    {
        $produto = Products::findOrFail($id);
        $produto->delete();
        return "Produtos Excluido <a href='/users/list'>Voltar para Lista</a>";
    }
    public function show($id)
    {
        $produto = Products::findOrFail($id);
        return view('produto.show', ['user' => $produto]);
    }
}
