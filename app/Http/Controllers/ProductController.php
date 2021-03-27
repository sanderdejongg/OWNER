<?php

namespace App\Http\Controllers;

use App\Product;
use App\Service\ProductServiceInterface;
use App\Service\TagsServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(ProductServiceInterface $productService)
    {
        $products = $productService->showProduct();
//        var_dump($products);

        return view('products.index')->with('products', $products);
    }

    public function store(Request $request, ProductServiceInterface $productService)
    {
        if ($productService->addProduct($request)){
            $status = 'Product saved as: ' . $request->name;
        } else{
            $status = 'Something went wrong while creating product, please try again.';
        }

//        return redirect('/products')->with('status', $status);
    }

    public function delete(Request $request, ProductServiceInterface $productService)
    {
        if ($productService->deleteProduct($request)){
            $status = 'Product succesfully deleted:';
        } else{
            $status = 'Something went wrong while deleting product, please try again.';
        }

        return redirect('/products')->with('status', $status);
    }
}
