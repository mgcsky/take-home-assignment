<?php

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductPricing;
use App\Models\Region;
use App\Models\RentalPeriod;
use App\Repository\Production\ProductRepository;

describe('Repository Product', function () {
    beforeEach(function () {
        $this->product = Product::create([
            'name' => 'product01',
            'description' => 'product description',
            'sku' => 'prd-01',
            'remark' => 'test abc',
            'sku' => 'prd-01',
        ]);

        $this->attributesValue = AttributeValue::create([
            'name' => 'color',
            'value' => 'green',
            'scope' => 'tablet'
        ]);

        $this->region = Region::create([
            'name' => 'Singapore',
        ]);

        $this->rentalPeriod = RentalPeriod::create([
            'duration' => 3,
        ]);

        $this->attribute = Attribute::create([
            'product_id' => $this->product->id,
            'attribute_value_id' => $this->attributesValue->id,
        ]);

        $this->productPricing = ProductPricing::create([
            'product_id' => $this->product->id,
            'region_id' => $this->region->id,
            'rental_period_id' => $this->rentalPeriod->id,
            'price' => 200,
        ]);

        $this->repository = new ProductRepository;
    });

    test('can retrieve data by default', function () {
        $products = $this->repository->list();
        expect($products)->toHaveCount(1);
    });

    test('can not retrieve data with pagination', function () {
        $pagination = [
            "limit" => 0,
            "offset" => 0,
        ];
        $products = $this->repository->list($pagination);
        expect($products)->toHaveCount(0);
    });

    test('can retrieve data with pagination but cannot retrieve attribute due to out of page', function () {
        $pagination = [
            "limit" => 10,
            "offset" => 0,
            "attribute" => [
                "limit" => 10,
                "offset" => 1,
            ]
        ];
        $products = $this->repository->list($pagination);
        expect($products->first()->attributesValue)->toHaveCount(0);
    });

    test('can retrieve data with pagination but cannot retrieve pricing due to out of page', function () {
        $pagination = [
            "limit" => 10,
            "offset" => 0,
            "pricing" => [
                "limit" => 10,
                "offset" => 1,
            ]
        ];
        $products = $this->repository->list($pagination);
        expect($products->first()->productPricing)->toHaveCount(0);
    });

    test('can not retrieve data with filter region', function () {
        $pagination = [
            "limit" => 10,
            "offset" => 0,
        ];
        $region = [
            "region" => "Malaysia",
        ];
        $products = $this->repository->list($pagination, $region);
        expect($products)->toHaveCount(0);
    });

    test('can not retrieve data with filter duration', function () {
        $pagination = [
            "limit" => 10,
            "offset" => 0,
        ];
        $region = [
            "rental_period" => 6,
        ];
        $products = $this->repository->list($pagination, $region);
        expect($products)->toHaveCount(0);
    });
});