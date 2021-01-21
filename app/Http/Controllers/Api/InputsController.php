<?php

namespace App\Http\Controllers\Api;
//http://127.0.0.1:8000/api/produtos
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inputs;

class InputsController extends Controller
{
    public function getAll()
    {
        return Inputs::all();
    }
    public function get($id)
    {
        return Inputs::find($id);
    }

    public function create()
    {
        return view('inputs.create');
    }


    public function post(Request $request)
    {
        $inputs = new Inputs();
        $inputs->product_id = $request->product_id;
        $inputs->after_amount  = $request->before_amount;
        $inputs->date = $request->date;
        $inputs->total_value = $request->total_value;
        $inputs->save();
        return response()->json([
            'message'=>'Product criado com sucesso!',
            'data'=>$inputs],200);
    }

    public function put(Request $request, $id)
    {
        $inputs = Inputs::find($id);
        if (is_null($inputs)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $inputs->update($request->all());
        return response($inputs, 200);
    }

    public function delete(Request $request, $id)
    {

        $inputs = Inputs::find($id);
        if (is_null($inputs)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $inputs->delete($request->all());
        return response($inputs, 200);
    }
}
