<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:products',
        ]);

        DB::insert("INSERT INTO products (name) VALUES ('".$request->name."')");

        return redirect('/products')->with('status', 'Product saved as: ' . $request->name);
    }

    public function delete(Request $request)
    {
        DB::delete("DELETE FROM products WHERE id = ".$request->id);

        return redirect('/products')->with('status', 'Product was deleted');
    }
}
