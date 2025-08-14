<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'order' => 'required|integer|min:1|unique:sliders',
            'status' => 'required|in:active,unactive',
        ];
    }

    public function messages(): array{
        return [
            'image.required' => 'تصویر اسلاید الزامی است.',
            'image.image' => 'فایل انتخاب شده باید یک تصویر باشد.',
            'image.mimes' => 'تصویر باید با فرمت jpg، jpeg، png یا webp باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۴ مگابایت باشد.',

            'link.url' => 'فرمت لینک وارد شده معتبر نیست.',

            'order.required' => 'ترتیب نمایش الزامی است.',
            'order.integer' => 'ترتیب نمایش باید یک عدد صحیح باشد.',
            'order.min' => 'ترتیب نمایش نمی‌تواند کمتر از ۱ باشد.',
            'order.unique' => 'این ترتیب نمایش تکراری است',

            'status.required' => 'انتخاب وضعیت الزامی است.',
            'status.in' => 'مقدار وضعیت باید active یا unactive باشد.',
        ];
    }
}
