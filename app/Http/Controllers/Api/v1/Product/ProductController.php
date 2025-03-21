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
        $attributeLimit = $request->has('attribute_limit') ? $request->attribute_limit : 10;
        $pricingOffset = $request->has('pricing_offset') ? $request->pricing_offset : 0;
        $pricingLimit = $request->has('pricing_limit') ? $request->pricing_limit : 10;

        $filter = $request->filter ?? [];

        $data = $this->productService->getList($offset, $limit, $attributeOffset, $attributeLimit, $pricingOffset, $pricingLimit, $filter);
        return $this->respond($data, 200, "Production return successfully");
    }
}