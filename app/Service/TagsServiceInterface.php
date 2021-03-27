<?php


namespace App\Service;


interface TagsServiceInterface
{
    public function updateTags($tags, $productId);

    public function bindTags($productId, $tagId);

    public function cleanUpTags($string);
}
