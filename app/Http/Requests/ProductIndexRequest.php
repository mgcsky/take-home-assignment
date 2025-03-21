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
            'offset' => 'integer',
            'limit' => 'integer',
            'attribute_offset' => 'integer',
            'pricing_offset' => 'integer',
            'child_limit' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'offset.integer' => 'offset is integer.',
            'limit.integer' => 'limit is integer.',
            'attribute_offset.integer' => 'attribute_offset is integer.',
            'pricing_offset.integer' => 'pricing_offset is integer.',
            'child_limit.integer' => 'child_limit is integer.',
        ];
    }
}
