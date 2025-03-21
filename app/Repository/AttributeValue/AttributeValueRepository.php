<?php

namespace App\Repository\AttributeValue;

use App\Models\Product;

class AttributeValueRepository implements AttributeValueInterface
{
    public function list()
    {
        return Product::all();
    }
}
