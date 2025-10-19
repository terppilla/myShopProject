<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));

    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|integer|min:1',
            'amount' => 'required|integer|min:0'
        ]);

        Product::create($validated);
    
        return redirect('/products')->with('success', 'Товар добавлен!');
}
     catch (\Exception $e) {
        return redirect('/products')->with('error', 'Ошибка при добавлении товара' .$e->getMessage());
     }
    
    }

    public function update(Request $request, $id) {
        try {
        $product = Product::find($id);
        $product->update($request->all());

        return redirect('/products')->with('success', 'Товар обновлён!');
        } catch (\Exception $e) {
            return redirect('/products')->with('error', 'Ошибка при обновлении товара' .$e->getMessage());
        }
    }

    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Товар удалён!');

    }

    public function getProduct($id) {
        $product = Product::find($id);
        return response() ->json($product);
    }

    public function show($id) {
        $product = Product::find($id); 
        return view('products.show', compact('product'));
    }

}
