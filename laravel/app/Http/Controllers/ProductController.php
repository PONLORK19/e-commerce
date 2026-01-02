<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET /api/products
    public function getProducts()
    {
        return response()->json(Product::all());
    }

    // POST /api/products
    public function createProduct(Request $request)
    {
        $product = Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'pricing'     => $request->pricing,
            'description' => $request->description,
            'images'      => $request->images,
        ]);

        return response()->json($product, 201);
    }

    // GET /api/products/{productId}
    public function getProduct($productId)
    {
        return response()->json(Product::findOrFail($productId));
    }

    // PATCH /api/products/{productId}
    public function updateProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->update($request->only([
            'name',
            'category_id',
            'pricing',
            'description',
            'images',
        ]));

        return response()->json($product);
    }

    // DELETE /api/products/{productId}
    public function deleteProduct($productId)
    {
        Product::findOrFail($productId)->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }

    // GET /api/categories/{categoryId}/products
    public function getProductsByCategory($categoryId)
    {
        return response()->json(
            Product::where('category_id', $categoryId)->get()
        );
    }
}
