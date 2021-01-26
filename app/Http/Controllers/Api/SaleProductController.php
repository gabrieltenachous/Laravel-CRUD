<?php

namespace App\Http\Controllers\Api;
//http://127.0.0.1:8000/api/produtos
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;
use Products;

class SaleProductController extends Controller
{
    public function getAll()
    {
        return SaleProduct::with('product','sale')->get()->toArray(); 
    }
    public function get($id)
    {   
        return SaleProduct::find($id);
    }

    public function create()
    {

        return view('saleproduct.create');
    }


    public function post(Request $request)
    {
        $sale = new SaleProduct();
        $sale->product_id = $request->product_id;
        $sale->sale_id  = $request->sale_id;
        $sale->after_amount = $request->after_amount;
        $sale->before_amount = $request->before_amount;
        $sale->unitary_value = $request->unitary_value;
        $sale->total_value = $request->total_value;
   
        $product = Product::find($request->product_id);

        $product->amount = $request->after_amount - $product->amount; 
  
        $sale->save();
        $product->save();
        return response()->json([
            'message' => 'Product criado com sucesso!',
            'data' => $sale
        ], 200);
    }

    public function put(Request $request, $id)
    {
        $sale = SaleProduct::find($id);
        if (is_null($sale)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $sale->update($request->all());
        return response($sale, 200);
    }

    public function delete(Request $request, $id)
    {

        $sale = SaleProduct::find($id);

        if (is_null($sale)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $sale->delete($request->all());
        return response($sale, 200);
    }
}
