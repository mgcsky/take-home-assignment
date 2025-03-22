<?php

namespace App\Repository\Production;

interface ProductInterface
{
    public function list(array $pagination, array $filter);
}
