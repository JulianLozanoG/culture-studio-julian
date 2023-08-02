<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a list of products with their names, description, and price.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Create a new product.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    /**
     * Update the specified product.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric',
            'qty' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $product->update($request->all());
        return response()->json($product);
    }

    /**
     * Remove the specified product.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    /**
     * Search products based on the entered keyword.
     */
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->get();

        return response()->json($products);
    }

    /**
     * Sort products by name or price in ascending or descending order.
     */
    public function sort(Request $request)
    {
        $sortField = $request->input('sort_field', 'name');
        $sortOrder = $request->input('sort_order', 'asc');

        if (!in_array($sortField, ['name', 'price'])) {
            $sortField = 'name';
        }

        $sortOrder = strtolower($sortOrder) === 'desc' ? 'desc' : 'asc';

        $products = Product::orderBy($sortField, $sortOrder)->get();

        return response()->json($products);
    }
}
