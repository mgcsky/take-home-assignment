<?php

namespace App\Repository\Regions;

interface RegionsInterface
{
    public function findByName(string $name);
}
