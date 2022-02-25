<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function list(Request $request)
    {
        $products = Product::query()->where('delete',0)->paginate();

        return response()->json($products);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::query()->create($request->all());

        return response()->json($product);
    }


    public function getProduct(Product $product, Request $request)
    {
        return response()->json($product);
    }

    public function edit(Product $product, UpdateProductRequest $request)
    {
        $product->sku = $request->get('sku');
        $product->name = $request->get('name');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');
        $product->description = $request->get('description');


        $product->save();

        return response()->json($product, 201);
    }

    public function remove(Product $product, Request $request)
    {
        $product->delete = 1;

        $product->save();

        return response()->json($product);
    }
}
