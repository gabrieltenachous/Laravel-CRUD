<?php

namespace App\Http\Controllers\Api;
//http://127.0.0.1:8000/api/produtos
use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function getAll()
    {
        return Sale::with('user')->get()->toArray();
    }
    public function get($id)
    {
        return Sale::find($id);
    }

    public function create()
    {

        return view('sales.create');
    }


    public function post(Request $request)
    {
        $sale = new Sale();
        $sale->date = $request->date;
        $sale->user_id  = $request->user_id;
        $sale->total_value = $request->total_value;


        $product = Sale::find($request->user_id);
        //$product->amount = $product->amount - $sale->amount;

        $product->save();
        $sale->save();
        return response()->json([
            'message' => 'Product criado com sucesso!',
            'data' => $sale
        ], 200);
    }

    public function put(Request $request, $id)
    {
        $sale = Sale::find($id);
        if (is_null($sale)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $sale->update($request->all());
        return response($sale, 200);
    }

    public function delete(Request $request, $id)
    {

        $sale = Sale::find($id);

        if (is_null($sale)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $sale->delete($request->all());
        return response($sale, 200);
    }
}
