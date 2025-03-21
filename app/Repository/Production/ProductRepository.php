<?php

namespace App\Repository\Production;

use App\Models\Product;

class ProductRepository implements ProductInterface
{
    public function list(int $offset = 0, int $limit = 10, int $attributeOffset = 0, int $pricingOffset = 0, int $childLimit = 10)
    {
        return Product::with([
                'attributesValue' => function ($query) use ($attributeOffset, $childLimit) {
                    $query->limit($childLimit)->offset($attributeOffset);
                },
                'productPricing'  => function ($query) use ($pricingOffset, $childLimit) {
                    $query->limit($childLimit)->offset($pricingOffset);
                },
                'productPricing.region' => function ($query) use ($pricingOffset, $childLimit) {
                    $query->limit($childLimit)->offset($pricingOffset);
                },
                'productPricing.rentalPeriod' => function ($query) use ($pricingOffset, $childLimit) {
                    $query->limit($childLimit)->offset($pricingOffset);
                },
            ])
            ->limit($limit)
            ->offset($offset)
            ->get();
    }
}
