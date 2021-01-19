<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
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

        $user->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]
        );
        return "Edição por ID com sucesso  <a href='/users/list'>Voltar para Lista</a>";
    }
    public function list()
    {
        $user = User::all();
        return view('users.lista',['users'=>$user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]); 

    }
    public function deletar($id){
        $user = User::findOrFail($id);
        return View('users.deletar',['user' =>$user]);

    } 
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return "Ususario Excluido <a href='/users/list'>Voltar para Lista</a>";
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }
 
}
