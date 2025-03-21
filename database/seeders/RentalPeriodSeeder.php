<?php

namespace Database\Seeders;

use App\Models\RentalPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!RentalPeriod::exists()) {
            RentalPeriod::insert([
                [
                    'duration' => 3,
                ],
                [
                    'duration' => 6,
                ],
                [
                    'duration' => 12,
                ],
            ]);
        }
    }
}
