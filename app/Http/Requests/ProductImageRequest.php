<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|numeric',
            'image_url' => "required|image|mimes:jpg,jpeg,png|sometimes",
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Bu alan zorunludur.',
            'product_id.numeric' => 'Bu alan sayısal bir değer olmak zorundadır.',
            'image_url.required' => 'Bu alan zorunludur.',
            'image_url.image' => 'Bu alan resim olmak zorundadır.',
            'image_url.mimes' => 'Bu alan yalnızca jpg,jpeg ve png uzantılı olmalıdır.',
        ];
    }
}
