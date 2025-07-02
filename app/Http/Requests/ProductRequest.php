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
            'name'     => 'required|string|max:255',
            'number' => 'required|integer|min:1',
            'size'     => 'required|string|max:50',
            'price'    => 'required|numeric|min:0',
            'type'     => 'required|string|max:100',
            'picture'  => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
        ];
    }
}
