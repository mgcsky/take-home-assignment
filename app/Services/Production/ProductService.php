<?php

namespace App\Services\Production;

use App\Http\Resources\ProductList;
use App\Models\Product;
use App\Repository\Production\ProductInterface;

class ProductService
{
    public $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getList(int $offset = 0, int $limit = 10, int $attributeOffset = 0, int $pricingOffset = 0, int $childLimit = 10)
    {
        $products = $this->productRepository->list($offset, $limit, $attributeOffset = 0, $pricingOffset = 0, $childLimit = 10);

        return ProductList::collection($products);
    }
}
