<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'sku' => $this->sku,
            'remark' => $this->remark,
            'attributes' => AttributeList::collection($this->attributesValue),
            'attributes_total' => $this->attributes_value_count,
            'pricing' => PricingList::collection($this->productPricing),
            'pricing_total' => $this->product_pricing_count,
        ];
    }
}
