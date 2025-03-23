<?php

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductPricing;
use App\Models\Region;
use App\Models\RentalPeriod;
use App\Repository\Product\ProductRepository;
use App\Service\Product\ProductService;

describe('Service Product - Count', function () {
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

        $repository = new ProductRepository;
        $this->services = new ProductService($repository);
    });

    test('can retrieve data by default', function () {
        $total = $this->services->getListTotal();
        expect($total)->toBe(1);
    });

    test('can not retrieve data with filter region', function () {
        $filter = [
            "region" => "Malaysia",
        ];
        $total = $this->services->getListTotal($filter);
        expect($total)->toBe(0);
    });

    test('can not retrieve data with filter duration', function () {
        $filter = [
            "rental_period" => 6,
        ];
        $total = $this->services->getListTotal($filter);
        expect($total)->toBe(0);
    });
});