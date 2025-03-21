<?php

namespace App\Repository\Regions;

use App\Models\Product;

class RegionsRepository implements RegionsInterface
{
    public function list()
    {
        return Product::all();
    }
}
