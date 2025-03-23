<?php

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductPricing;
use App\Models\Region;
use App\Models\RentalPeriod;

describe('Product', function () {
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

    });

    describe('List', function () {
        test('returns a successful response', function () {
            $this->get("/api/v1/products")
                ->assertOk();
        });

        test('returns a successful response with pagination', function () {
            $this->get("/api/v1/products", [
                "pagination" => [
                    "limit" => 10,
                    "offset" => 0,
                    "attribute" => [
                        "limit" => 10,
                        "offset" => 0,
                    ],
                    "pricing" => [
                        "limit" => 10,
                        "offset" => 0,
                    ]
                ]
            ])
                ->assertOk();
        });

        test('returns a successful response with filter', function () {
            $this->get("/api/v1/products", [
                "filter" => [
                    "region" => 'Singapore',
                    "duration" => 3,
                ],
            ])
                ->assertOk();
        });
    });
    describe('Count', function () {
        test('returns a successful response', function () {
            $this->get("/api/v1/products/count")
                ->assertOk();
        });

        test('returns a successful response with filter', function () {
            $this->get("/api/v1/products/count", [
                "filter" => [
                    "region" => 'Singapore',
                    "duration" => 3,
                ],
            ])
                ->assertOk();
        });
    });
});
