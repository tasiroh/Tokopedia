<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class PublicProductController extends BaseController
{
    public function index()
    {
        $products = Product::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "products",
            "result" => $products
        ];

        return response()->json($output, 200);
    }

   
    public function show($id)
    {
        $products = Product::find($id);

        if (!$products) {
            abort(404);
        }

        return response()->json($products, 200);
    }


    
}