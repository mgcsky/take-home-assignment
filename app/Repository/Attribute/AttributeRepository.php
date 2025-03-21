<?php

namespace App\Repository\Attribute;

use App\Models\Product;
use App\Repository\Attribute\AttributeInterface;

class AttributeRepository implements AttributeInterface
{
    public function list()
    {
        return Product::all();
    }
}
