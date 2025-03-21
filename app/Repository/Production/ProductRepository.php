<?php

namespace App\Repository\Production;

use App\Models\Product;

class ProductRepository implements ProductInterface
{
    public function list(int $offset = 0, int $limit = 10, int $attributeOffset = 0, int $attributeLimit = 10, int $pricingOffset = 0, int $pricingLimit = 10, $filter = [])
    {
        $regionFilter = data_get($filter, 'region', null);
        $rentalPeriodFilter = data_get($filter, 'rental_period', null);

        return Product::whereHas('productPricing.region', function ($query) use ($regionFilter) {
                $regionFilter && $query->where('name', $regionFilter);
            })
            ->whereHas('productPricing.rentalPeriod', function ($query) use ($rentalPeriodFilter) {
                $rentalPeriodFilter && $query->where('duration', $rentalPeriodFilter);
            })
            ->with([
                'attributesValue' => function ($query) use ($attributeOffset, $attributeLimit) {
                    $query->limit($attributeLimit)->offset($attributeOffset);
                },
                'productPricing'  => function ($query) use ($pricingOffset, $pricingLimit) {
                    $query->limit($pricingLimit)->offset($pricingOffset);
                },
                'productPricing.region' => function ($query) use ($pricingOffset, $pricingLimit) {
                    $query->limit($pricingLimit)->offset($pricingOffset);
                },
                'productPricing.rentalPeriod' => function ($query) use ($pricingOffset, $pricingLimit) {
                    $query->limit($pricingLimit)->offset($pricingOffset);
                },
            ])
            ->limit($limit)
            ->offset($offset)
            ->get();
    }
}
