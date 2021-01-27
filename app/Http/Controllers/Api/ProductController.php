<?php

namespace App\Http\Controllers\Api;
//http://127.0.0.1:8000/api/produtos
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll()
    {
        return Product::with('inputs.product', 'saleproducts.product','saleproducts.sale')->get()->toArray();
    }
    public function get($id)
    {
        return Product::find($id);
    }

    public function create()
    {

        return view('products.create');
    }


    public function post(Request $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->amount  = $request->amount;
        $products->code = $request->code;
        $products->save();
        return response()->json([
            'message' => 'Product criado com sucesso!',
            'data' => $products
        ], 200);
    }

    public function put(Request $request, $id)
    {
        $products = Product::find($id);
        if (is_null($products)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $products->update($request->all());
        return response($products, 200);
    }

    public function delete(Request $request, $id)
    {

        $products = Product::find($id);

        if (is_null($products)) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $products->delete($request->all());
        return response($products, 200);
    }
}
