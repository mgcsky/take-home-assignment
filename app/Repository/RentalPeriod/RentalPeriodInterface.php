<?php

namespace App\Repository\RentalPeriod;

interface RentalPeriodInterface
{
    public function findByDuration(int $duration);
}
