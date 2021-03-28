<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Notifications\ProductComplete;
use App\Service\ProductServiceInterface;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductServiceInterface $productService)
    {
        $products = $productService->showProduct();
        $user = User::find(1);
        return view('products.index')->with('products', $products)->with('notifications', $user->notifications);
    }

    public function store(Request $request, ProductServiceInterface $productService)
    {
        $productService->addProduct($request);
        $user_current = User::find(1);
        $users = User::all();
        foreach ($users as $user){
            $user->notify(new ProductComplete($user_current));
        }
        event(new ProductCreated('product successfully created'));
        return redirect('/products');
    }

    public function delete(Request $request, ProductServiceInterface $productService)
    {
        if ($productService->deleteProduct($request)){
            $status = 'Product successfully deleted';
        } else{
            $status = 'Something went wrong while deleting product, please try again.';
        }
        return redirect('/products')->with('status', $status);
    }
}
