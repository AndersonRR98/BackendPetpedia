<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_id'    => 'nullable|exists:categories,id',
            'veterinary_id'  => 'nullable|exists:veterinaries,id',
            'shoppingcar_id' => 'nullable|exists:shoppingcars,id',
        ]);

        $data = $request->only([
            'name', 'description', 'price',
            'category_id', 'veterinary_id', 'shoppingcar_id'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image_path'] = $path;
        }

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'           => 'sometimes|string|max:255',
            'description'    => 'sometimes|string',
            'price'          => 'sometimes|numeric',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'category_id'    => 'nullable|exists:categories,id',
            'veterinary_id'  => 'nullable|exists:veterinaries,id',
            'shoppingcar_id' => 'nullable|exists:shoppingcars,id',
        ]);

        $data = $request->only([
            'name', 'description', 'price',
            'category_id', 'veterinary_id', 'shoppingcar_id'
        ]);

        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $path = $request->file('image')->store('products', 'public');
            $data['image_path'] = $path;
        }

        $product->update($data);
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
