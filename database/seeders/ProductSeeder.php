<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Product::exists()) {
            Product::insert([
                [
                    'name' => 'product01',
                    'description' => 'product description',
                    'sku' => 'prd-01',
                    'remark' => 'test product 01',
                ],
                [
                    'name' => 'product02',
                    'description' => 'product description',
                    'sku' => 'prd-02',
                    'remark' => 'test product 02',
                ],
                [
                    'name' => 'product03',
                    'description' => 'product description',
                    'sku' => 'prd-03',
                    'remark' => 'test product 03',
                ],
            ]);
        }
    }
}
