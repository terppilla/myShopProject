<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $products = [ [
            'name' => 'Ноутбук 1',
            'price' => 50000,
            'description' => 'описание товара',
            'amount' => 45
        ],
        [
            'name' => 'Ноутбук 2',
            'price' => 40000,
            'description' => 'описание товара',
            'amount' => 98
        ],
        [
            'name' => 'Ноутбук 3',
            'price' => 64900,
            'amount' => 0

        ]
        ];

        foreach ($products as $product) {
            \App\Models\Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
    }
}
}
