<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Region::exists()) {
            Region::insert([
                [
                    'name' => 'Singapore',
                ],
                [
                    'name' => 'Malaysia',
                ],
            ]);
        }
    }
}
