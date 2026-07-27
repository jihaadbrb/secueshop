<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // VULNERABLE search - SQL injection + XSS
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        if ($search) {
            // VULNERABLE: raw SQL query - SQL injection
            $products = DB::select("SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'");
        } else {
            $products = DB::select("SELECT * FROM products");
        }

        return view('products.index', compact('products', 'search'));
    }

    public function show($id)
    {
        $product = DB::select("SELECT * FROM products WHERE id = ?", [$id]);
        return view('products.show', compact('product'));
    }
} 
