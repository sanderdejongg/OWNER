<?php


namespace App\Service;

use App\Events\ProductCreated;
use App\Product;
use App\Tags;

class ProductService implements ProductServiceInterface
{

    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    public $tagsService;

    public function __construct(){
        $this->tagsService = app(TagsService::class);
    }

    public function showProduct(){

        return Product::all();

    }

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
            $this->tagsService->updateTags($request->tags, $product->id);
            ProductCreated::dispatch($product);
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
