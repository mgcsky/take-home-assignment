<?php

namespace App\Repository\Production;

interface ProductInterface
{
    public function list(int $offset = 0, int $limit = 10, int $attributeOffset = 0, int $pricingOffset = 0, int $childLimit = 10);
}
