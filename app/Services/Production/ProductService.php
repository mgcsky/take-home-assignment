<?php

namespace App\Services\Production;

use App\Http\Resources\ProductList;
use App\Repository\Production\ProductInterface;

class ProductService
{
    public $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Products Listing
     *
     * @param array $pagination
     * @param array $filter
     * 
     * @return Illuminate\Http\Resources\Json\JsonResource
     */
    public function getList(array $pagination = [], array $filter = [])
    {
        $products = $this->productRepository->list($pagination, $filter);

        return ProductList::collection($products);
    }
}
