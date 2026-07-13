<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Laptop Pro X', 'description' => 'High performance laptop for professionals', 'price' => 1299.99, 'category' => 'Electronics', 'stock' => 15],
            ['name' => 'Wireless Mouse', 'description' => 'Ergonomic wireless mouse with long battery life', 'price' => 29.99, 'category' => 'Accessories', 'stock' => 50],
            ['name' => 'Mechanical Keyboard', 'description' => 'RGB mechanical keyboard with tactile switches', 'price' => 89.99, 'category' => 'Accessories', 'stock' => 30],
            ['name' => 'Monitor 4K', 'description' => '27 inch 4K monitor with HDR support', 'price' => 499.99, 'category' => 'Electronics', 'stock' => 10],
            ['name' => 'USB-C Hub', 'description' => '7 in 1 USB-C hub with HDMI and ethernet', 'price' => 49.99, 'category' => 'Accessories', 'stock' => 25],
            ['name' => 'Webcam HD', 'description' => '1080p webcam with built-in microphone', 'price' => 79.99, 'category' => 'Electronics', 'stock' => 20],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert(array_merge($product, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}