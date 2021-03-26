<?php

namespace App\Service;

interface ProductServiceInterface
{
    public function addProduct($request);

    public function deleteProduct($request);
}
