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
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'product_code' => 'required|string|max:100|unique:products,product_code',
            'price' => 'required|numeric|min:0',
            'number' => 'required|integer|min:0',
            'size' => 'nullable|string|max:100',
            'colorPicker' => 'nullable|string|max:20',
            'colors' => 'nullable|json',
            'status' => 'required|in:موجود,ناموجود,به زودی',
            'description' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام محصول الزامی است.',
            'product_code.required' => 'کد محصول الزامی است.',
            'product_code.unique' => 'کد محصول قبلاً استفاده شده است.',
            'price.required' => 'قیمت را وارد کنید.',
            'number.required' => 'موجودی انبار را وارد کنید.',
            'status.in' => 'مقدار وضعیت باید یکی از: موجود، ناموجود یا به زودی باشد.',
            'picture.image' => 'فایل انتخابی باید یک تصویر باشد.',
        ];
    }
}
