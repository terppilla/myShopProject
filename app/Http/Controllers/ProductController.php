<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = [ [
            'id' => 1,
            'name' => 'Ноутбук 1',
            'price' => "50000",
        ],
        [
            'id' => 2,
            'name' => 'Ноутбук 2',
            'price' => "40000",
        ],
        [
            'id' => 3,
            'name' => 'Ноутбук 3',
            'price' => "65000",
        ]
        ];
        return view('products.index', ['products' => $products] );

    }
}
