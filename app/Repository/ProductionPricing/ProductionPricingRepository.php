<?php

namespace App\Repository\ProductionPricing;

use App\Models\Product;

class ProductionPricingRepository implements ProductionPricingInterface
{
    public function list()
    {
        return Product::all();
    }
}
