<?php

namespace App\Repository\Regions;

use App\Models\Region;

class RegionsRepository implements RegionsInterface
{
    public function findByName(string $name)
    {
        return Region::where("name", $name)->first();
    }
}
