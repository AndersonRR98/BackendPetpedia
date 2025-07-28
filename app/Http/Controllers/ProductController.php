<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::included()->filter()->sort()->getOrPaginate();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'description'    => 'required|string',
            'price'          => 'required|numeric',
            'image'          => 'nullable|string',
            'category_id'    => 'nullable|exists:categories,id',
            'veterinary_id'  => 'nullable|exists:veterinaries,id',
            'shoppingcar_id' => 'nullable|exists:shoppingcars,id',
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'           => 'string|max:255',
            'description'    => 'string',
            'price'          => 'numeric',
            'image'          => 'nullable|string',
            'category_id'    => 'nullable|exists:categories,id',
            'veterinary_id'  => 'nullable|exists:veterinaries,id',
            'shoppingcar_id' => 'nullable|exists:shoppingcars,id',
        ]);

        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
