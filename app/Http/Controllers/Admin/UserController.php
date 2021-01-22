<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return "Criado com sucesso  <a href='./list'>Voltar para Lista</a>";
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        try {

            $user->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                ]
            );
        } catch (QueryException $th) {
            return "Erro inesperado";
        }
        return "Edição por ID com sucesso  <a href='/users/list'>Voltar para Lista</a>";
    }
    public function list()
    {
        $user = User::all();
        return view('user.lista', ['users' => $user]);
    }

    public function edit($id, Request $request)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }
    public function deletar($id)
    {
        $user = User::findOrFail($id);
        return View('user.deletar', ['user' => $user]);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return "Ususario Excluido <a href='/users/list'>Voltar para Lista</a>";
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }
}
