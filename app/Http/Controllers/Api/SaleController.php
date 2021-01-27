<?php

namespace App\Http\Controllers\Api;
//http://127.0.0.1:8000/api/produtos
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function getAll()
    {
        return Sale::with('saleprodutcts.product', 'user','saleprodutcts.sale')->get()->toArray();
    }
    public function get($id)
    {
        return Sale::find($id);
    }

    public function create()
    {

        return view('sale.create');
    }


    public function post(Request $request)
    {
        $sale = new Sale();
        $sale->user_id  = 3;
        $sale->total_value = 1;
        $sale->save();

        $valor = 0;
        $contador = 0;

        foreach ($request->product_id as $product) {
            $saleProduct = new SaleProduct();
            $saleProduct->sale_id = $sale->id;
            $saleProduct->product_id = $product;
            $saleProduct->amount = $request->amount[$contador];
            $saleProduct->unitary_value = $request->unitary_value[$contador];
            $prod = Product::find($product);

            if ($prod->amount < $saleProduct->amount) {
                $sale->delete();
                return response()->json([
                    'message' => 'Não foi possível realizar a venda, a quantidade comprada é maior do que o estoque!',
                    'data' => $sale
                ], 400);
            }

            $saleProduct->before_amount =  $prod->amount;
            $saleProduct->after_amount =  $prod->amount - $request->amount[$contador];
            $prod->amount = $saleProduct->after_amount;
            $saleProduct->total_value =  $saleProduct->amount * $saleProduct->unitary_value;
            $valor += $saleProduct->total_value;
            $saleProduct->save();
            $prod->save();
            $contador++;
        }



        $sale->total_value = $valor;
        $sale->save();

        return response()->json([
            'message' => 'Venda realizada com sucesso!',
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
