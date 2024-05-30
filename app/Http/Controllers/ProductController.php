<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $data = [
            'products' => $products,
        ];

        return view('products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Success added new product!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:0',
        ]);

        $product->update($validated);
        return redirect()->route('products.show', ['product' => $product->id])->with('success', 'Success update this product!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Success delete product!');
    }
}
