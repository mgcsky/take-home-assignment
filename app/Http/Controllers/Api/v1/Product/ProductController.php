<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductIndexRequest;
use App\Services\Production\ProductService;

class ProductController extends Controller
{
    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Products Listing
     *
     * @param ProductIndexRequest $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductIndexRequest $request)
    {
        $pagination = $request->pagination ?? [];
        $filter = $request->filter ?? [];

        $data = $this->productService->getList($pagination, $filter);
        return $this->respond($data, 200, "Production return successfully");
    }
}