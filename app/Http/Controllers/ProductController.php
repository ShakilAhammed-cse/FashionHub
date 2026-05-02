<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show admin products page
    public function index()
    {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    // Store new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:mens,womens,kids',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|string',
        ]);

        Product::create($validated);
        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }

    // Delete product
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }
}
