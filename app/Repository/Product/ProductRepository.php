<?php

namespace App\Repository\Product;

use App\Models\Product;

class ProductRepository implements ProductInterface
{
    public function list(array $pagination = [], array $filter = [], bool $isCount = false)
    {
        $regionFilter = data_get($filter, 'region', null);
        $rentalPeriodFilter = data_get($filter, 'rental_period', null);

        $limit = data_get($pagination, 'limit', 10);
        $offset = data_get($pagination, 'offset', 0);

        $query = Product::with([
                'attributesValue' => function ($query) use ($pagination) {        
                    if (!is_null(data_get($pagination, 'attribute'))) {
                        $query->limit(data_get($pagination, 'attribute.limit'))
                            ->offset(data_get($pagination, 'attribute.offset'));
                    }
                },
                'productPricing'  => function ($query) use ($pagination) {
                    if (!is_null(data_get($pagination, 'pricing'))) {
                        $query->limit(data_get($pagination, 'pricing.limit'))
                            ->offset(data_get($pagination, 'pricing.offset'));
                    }
                },
                'productPricing.region',
                'productPricing.rentalPeriod',
            ])->withCount([
                'attributesValue',
                'productPricing',
            ]);

            if (!is_null($regionFilter)) {
                $query->whereHas('productPricing.region', function ($query) use ($regionFilter) {
                    $query->where('name', $regionFilter);
                });
            }

            if (!is_null($rentalPeriodFilter)) {
                $query->whereHas('productPricing.rentalPeriod', function ($query) use ($rentalPeriodFilter) {
                    $query->where('duration', $rentalPeriodFilter);
                });
            }

        if ($isCount) {
            return $query->count();
        }

        return $query->limit($limit)
            ->offset($offset)
            ->get();
    }
}
