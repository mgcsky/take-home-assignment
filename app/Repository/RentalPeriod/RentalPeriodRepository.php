<?php

namespace App\Repository\RentalPeriod;

use App\Models\RentalPeriod;

class RentalPeriodRepository implements RentalPeriodInterface
{
    public function findByDuration(int $duration)
    {
        return RentalPeriod::where('duration', $duration)->first();
    }
}
