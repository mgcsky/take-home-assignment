<?php

namespace App\Repository\Product;

interface ProductInterface
{
    public function list(array $pagination, array $filter, bool $isCount = false);
}
