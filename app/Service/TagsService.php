<?php


namespace App\Service;


use App\product_tags;
use App\Tag_Product;
use App\Tags;

class TagsService
{
    public function updateTags($tags, $productId){
        $tag_array = explode(",",$tags);
        foreach ($tag_array as $item){
            $item = $this->cleanUpTags($item);
            if (\App\Tags::where('name', '=', $item)->exists()) {
                $tag = \App\Tags::where('name', '=', $item)->first();
                $this->bindTags($productId, $tag->id);
            } else{
                $tag = new Tags();
                $tag->name = $item;
                $tag->save();
            }
            $this->bindTags($productId, $tag->id);
        }
    }

    public function bindTags($productId, $tagId){
        $tag_product = new product_tags();
        $tag_product->product_id = $productId;
        $tag_product->tags_id = $tagId;
        $tag_product->save();
    }

    public function cleanUpTags($string){
        if ( $string[0] == ' '){
            $string = ltrim($string, $string[0]);
        }
        return $string;
    }
}
