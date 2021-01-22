<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class InputController extends Controller
{
    public function create(Request $request)
    {
        return view('input.create');
    }

    public function store(Request $request)
    {
        Input::create([
            'product_id' => $request->product_id,
            'after_amount' => $request->after_amount,
            'before_amount' => $request->before_amount,
            'unitary_value' => $request->unitary_value,
            'date' => $request->date,
            'total_value' => $request->total_value,
        ]);
        return "Criado com sucesso  <a href='./inputs'>Voltar para Lista</a>";
    }

    public function update(Request $request, $id)
    {
        $produtos = Input::findOrFail($id);
        try {

            $produtos->update(
                [
                    'product_id' => $request->product_id,
                    'after_amount' => $request->after_amount,
                    'before_amount' => $request->before_amount,
                    'unitary_value' => $request->unitary_value,
                    'date' => $request->date,
                    'total_value' => $request->total_value,
                ]
            );
        } catch (QueryException $th) {
            return "Erro inesperado";
        }
        return "Edição por ID com sucesso  <a href='/inputs/list'>Voltar para Lista</a>";
    }
    public function list()
    {
        $produto = Input::all();
        return view('input.lista', ['input' => $produto]);
    }

    public function edit($id, Request $request)
    {
        $produto = Input::findOrFail($id);
        return view('input.edit', ['user' => $produto]);
    }
    public function deletar($id)
    {
        $produto = Input::findOrFail($id);
        return View('inputs.deletar', ['input' => $produto]);
    }
    public function destroy($id)
    {
        $produto = Input::findOrFail($id);
        $produto->delete();
        return "Produtos Excluido <a href='/users/list'>Voltar para Lista</a>";
    }
    public function show($id)
    {
        $produto = Input::findOrFail($id);
        return view('input.show', ['input' => $produto]);
    }
}
