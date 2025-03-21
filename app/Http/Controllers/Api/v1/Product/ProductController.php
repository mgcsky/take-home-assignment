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

    public function index(ProductIndexRequest $request)
    {
        $offset = $request->has('offset') ? $request->offset : 0;
        $limit = $request->has('limit') ? $request->limit : 10;
        $attributeOffset = $request->has('attribute_offset') ? $request->attribute_offset : 0;
        $pricingOffset = $request->has('pricing_offset') ? $request->pricing_offset : 0;
        $childLimit = $request->has('child_limit') ? $request->child_limit : 10;

        $data = $this->productService->getList($offset, $limit, $attributeOffset, $pricingOffset, $childLimit);
        return $this->respond($data, 200, "Production return successfully");
    }
}