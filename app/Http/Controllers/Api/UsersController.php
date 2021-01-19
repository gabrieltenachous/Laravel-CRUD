<?php

namespace App\Http\Controllers\Api;
//http://127.0.0.1:8000/api/users
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function getAll()
    { 
        return response()->json(User::all(),200);
    }
    public function get($id)
    { 
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message' => 'Usuario não encontrado'],404);
        }
        return response()->json($user::find($id),200);
    }
    public function post(Request $request)
    {
        $user = User::create($request->all());
        if(is_null($user)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        return response($user,201);
        // $pessoa->name = $request->name;
        // $pessoa->email = $request->email;
        // $pessoa->password = $request->password; 
        // $pessoa->save();
        // return $pessoa;
    }
    public function put(Request $request, $id) {
        $user = User::find($id);
        if(is_null($user)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $user->update($request->all());
        return response($user, 200);
    } 

    public function delete(Request $request, $id) {
        $user = User::find($id);
        if(is_null($user)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $user->delete($request->all());
        return response($user, 200);
    } 
}
