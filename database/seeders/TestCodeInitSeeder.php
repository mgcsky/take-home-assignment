<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductPricing;
use App\Models\Region;
use App\Models\RentalPeriod;
use Illuminate\Database\Seeder;

class TestCodeInitSeeder extends Seeder
{
    /**
     * Run the database seeds for init test data.
     */
    public function run(): void
    {
        if (!Product::exists()) {
            (new ProductSeeder())->run();
            (new AttributeValueSeeder())->run();
            (new RegionSeeder())->run();
            (new RentalPeriodSeeder())->run();

            $products = Product::all();
            $attributeValues = AttributeValue::all();
            $regions = Region::all();
            $rentalPeriods = RentalPeriod::all();
            
            foreach ($products as $product) {
                $randomColor = $attributeValues->where('name', 'color')->random();
                $randomSize = $attributeValues->where('name', 'size')->random();
                Attribute::insert([
                    [
                        'product_id' => $product->id,
                        'attribute_value_id' => $randomColor->id,
                    ],
                    [
                        'product_id' => $product->id,
                        'attribute_value_id' => $randomSize->id,
                    ]
                ]);

                foreach($regions as $region) {
                    foreach($rentalPeriods as $rentalPeriod) {
                        ProductPricing::insert([
                            [
                                'product_id' => $product->id,
                                'region_id' => $region->id,
                                'rental_period_id' => $rentalPeriod->id,
                                'price' => rand(300, 400)
                            ]
                        ]);
                    }
                }
            }

        }
    }
}
