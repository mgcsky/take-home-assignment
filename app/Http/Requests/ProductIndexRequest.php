<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pagination.offset' => 'integer',
            'pagination.limit' => 'integer',
            'pagination.attribute.offset' => 'integer',
            'pagination.attribute.limit' => 'integer',
            'pagination.pricing.offset' => 'integer',
            'pagination.pricing.limit' => 'integer',
            'filter' => 'array',
            'pagination' => 'array',
        ];
    }

    public function messages()
    {
        return [
            'pagination.offset.integer' => 'offset is integer.',
            'pagination.limit.integer' => 'limit is integer.',
            'pagination.attribute.offset.integer' => 'attribute offset is integer.',
            'pagination.attribute.limit.integer' => 'attribute limit is integer.',
            'pagination.pricing.offset.integer' => 'attribute offset is integer.',
            'pagination.pricing.limit.integer' => 'attribute limit is integer.',
            'filter.array' => 'filter is array.',
            'pagination.array' => 'pagination is array.',
        ];
    }
}
