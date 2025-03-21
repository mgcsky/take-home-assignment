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
        $pricing = [];
        foreach ($this->productPricing as $item) {
            $pricing[$item->region->name][] = [
                "rental_period" => $item->rentalPeriod->duration,
                "price" => $item->price,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'sku' => $this->sku,
            'remark' => $this->remark,
            'attributes' => AttributeList::collection($this->attributesValue),
            'pricing' => $pricing,
        ];
    }
}
