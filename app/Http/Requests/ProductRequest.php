<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'              => ['required','string','max:255'],
            'sku'               => ['required','string','max:100'],
            'category'          => ['required','string','in:Electronics,Fashion,Home & Living'],
            'price'             => ['required','numeric','min:0'],
            'discount_price'    => ['nullable', 'numeric', 'min:0', 'lt:price'],
            'stock'             => ['required','integer','min:0'],
            'image'             => ['nullable','image','mimes:jpg,jpeg,png,webp'],
            'status'            => ['required','in:0,1'],
            'featured'          => ['boolean'],
            'short_description' => ['nullable','string','max:500'],
        ];
    }
    public function messages(): array
    {
        return [
            // Name
            'name.required'      => 'Product name is required.',
            'name.string'        => 'Product name must be a valid string.',
            'name.max'           => 'Product name must not exceed 255 characters.',

            // SKU
            'sku.string'         => 'SKU must be a valid string.',
            'sku.max'            => 'SKU must not exceed 100 characters.',
//            'sku.unique'         => 'This SKU is already in use.',

            // Category
            'category.required'  => 'Category is required.',
            'category.string'    => 'Category must be a valid string.',
            'category.in'        => 'Category must be one of: Electronics, Fashion, Home & Living.',

            // Brand
            'brand.string'       => 'Brand must be a valid string.',

            // Price
            'price.required'    =>  'Price is required.',
            'price.numeric'     =>  'Price must be a number.',
            'price.min'         =>  'Price must be at least 0.',

            // Discount Price
            'discount_price.required'    => 'Discount price must be a number.',
            'discount_price.integer'     => 'Discount price must be at least 0.',
            'discount_price.min'         => 'Discount price must be less than regular price.',

            // Stock
            'stock.required'    => 'Stock quantity is required.',
            'stock.integer'     => 'Stock must be a whole number.',
            'stock.min'         => 'Stock must be at least 0.',

            // Image
            'image.image'       => 'Uploaded file must be an image.',
            'image.mimes'       => 'Image must be a file of type:jpg,jpeg,png,webp',

            // Status
            'status.required'   => 'Status is required.',
            'status.in'         => 'Status must be either 0 (inactive) or 1(active).',

            // Featured
            'featured.boolean'  => 'Featured must be true or false.',

            // Short Description
            'short_description.string'  => 'Short description must be a valid string.',
            'short_description.max'     => 'Short description must not exceed 500 characters.',

            // description
            'description.string'    => 'Description must be a valid string.',
        ];
    }


}
