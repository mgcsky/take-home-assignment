<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!AttributeValue::exists()) {
            AttributeValue::insert([
                [
                    'name' => 'color',
                    'value' => 'red',
                    'scope' => 'mobile',
                ],
                [
                    'name' => 'color',
                    'value' => 'blue',
                    'scope' => 'mobile',
                ],
                [
                    'name' => 'color',
                    'value' => 'white',
                    'scope' => 'mobile',
                ],
                [
                    'name' => 'size',
                    'value' => '20',
                    'scope' => 'mobile',
                ],
                [
                    'name' => 'size',
                    'value' => '19',
                    'scope' => 'mobile',
                ],
                [
                    'name' => 'size',
                    'value' => '18',
                    'scope' => 'mobile',
                ],
            ]);
        }
    }
}
