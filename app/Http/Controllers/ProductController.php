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

        $product = new Product();
        $product->name = $request->name;
        $product->save();

        return redirect('/products')->with('status', 'Product saved as: ' . $request->name);
    }

    public function delete(Request $request)
    {

          \App\Product::where('id', $request->id)->delete();

        return redirect('/products')->with('status', 'Product was deleted');
    }
}
