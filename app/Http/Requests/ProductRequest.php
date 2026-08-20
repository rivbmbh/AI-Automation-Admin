<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return $this->user()->role === 'admin';
        return true; // Allow all users for now, adjust as needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product')?->id; // Get the product ID from the route if it exists
        return [
            'name' => ['required', 'string', 'max:255', 'unique:products,name,' . $productId],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],    
            'stock' => ['required', 'integer', 'min:0'],
            'category'    => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 255 characters.',
            'name.unique' => 'The product name has already been taken.',

            'description.string' => 'The description must be a string.',

            'category.required'    => 'Category is required.',
            'category.string'      => 'Category must be text.',
            'category.max'         => 'Category must not exceed 100 characters.',

            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',

            'stock.required' => 'The stock is required.',
            'stock.integer' => 'The stock must be an integer.',
            'stock.min' => 'The stock must be at least 0.',
        ];
    }
}
