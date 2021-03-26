<?php


namespace App\Service;


use App\Product;

class ProductService implements ProductServiceInterface
{

    public function addProduct($request)
    {
        $request->validate([
            'name'          => 'required|unique:products',
            'description'   => 'required',
        ]);

        try{
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
            return true;
        } catch (\Exception $e){
            echo 'something went wrong: ' . $e;
            return false;
        }
    }

    public function deleteProduct($request)
    {
        try {
            \App\Product::where('id', $request->id)->delete();
            return true;
        } catch (\Exception $e){
            echo 'something went wrong: ' . $e;
            return false;
        }
    }
}
