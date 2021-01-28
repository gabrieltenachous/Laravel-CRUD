<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Input;

class InputController extends Controller
{
    public function getAll()
    {
        //return Product::all(); 
        return Input::with('product')->get()->toArray();
    }
    public function get($id)
    {
        return Input::find($id);
    }

    public function create()
    {
        return view('inputs.create');
    }


    public function post(Request $request)
    {
        $inputs = new Input();
        $inputs->product_id = $request->product_id;
        $inputs->amount  = $request->amount; //2
        $inputs->unitary_value  = $request->unitary_value;
        $inputs->total_value = $request->amount * $request->unitary_value;

        $products = Product::find($request->product_id);

        $inputs->before_amount = $products->amount;
        $inputs->after_amount  = $products->amount + $request->amount;
        $products->amount = $inputs->after_amount;

        $inputs->save();

        $inputs->date = $inputs->created_at;
        $inputs->save();
        $products->save();

        return response()->json([
            'message' => 'Product criado com sucesso!',
            'data' => $inputs
        ], 200);
    }

    public function put(Request $request, $id)
    {
        $inputs = Input::find($id);
        if (is_null($inputs)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }

        $inputs->product->amount = $request->amount;
        $inputs->amount = $request->after_amount;
        $inputs->total_value = $request->unitary_value * $request->amount;
        $inputs->update($request->all());
        $inputs->product->save();
        $inputs->save();
        return response($inputs, 200);
    }

    public function delete(Request $request, $id)
    {

        $inputs = Input::find($id);
        $product = Product::find($inputs->product_id);
        $product->amount = $inputs->before_amount;
        $product->save();
        $inputs->delete();

        if (is_null($inputs)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $inputs->delete($request->all());
        return response($inputs, 200);
    }
}
