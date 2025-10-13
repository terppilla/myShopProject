<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', ['products' => $products] );

    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|integer|min:1',
            'amount' => 'required|integer|min:0'
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Товар добавлен!');
    }

}
