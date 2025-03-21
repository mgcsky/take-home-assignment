<?php

namespace App\Repository\Production;

interface ProductInterface
{
    public function list(int $offset, int $limit, int $attributeOffset, int $attributeLimit, int $pricingOffset, int $pricingLimit, $filter);
}
