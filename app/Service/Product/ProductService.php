<?php

namespace App\Service\Product;

use App\Http\Resources\ProductList;
use App\Repository\Product\ProductInterface;

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

    /**
     * Products Count By Filter
     *
     * @param array $filter
     * 
     * @return Illuminate\Http\Resources\Json\JsonResource
     */
    public function getListTotal(array $filter = [])
    {
        $total = $this->productRepository->list([], $filter, true);

        return $total;
    }
}
