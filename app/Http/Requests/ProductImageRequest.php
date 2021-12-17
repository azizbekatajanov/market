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
            'images.0.name'=>'required|image|mimes:jpg,jpeg,bmp,svg,png|max:5000',
            'images.0.product_id'=>'required|integer|',
            'images.1.name'=>'nullable|image|mimes:jpg,jpeg,bmp,svg,png|max:5000',
            'images.1.product_id'=>'required|integer|',
            'images.2.name'=>'nullable|image|mimes:jpg,jpeg,bmp,svg,png|max:5000',
            'images.2.product_id'=>'required|integer|',
            'images.3.name'=>'nullable|image|mimes:jpg,jpeg,bmp,svg,png|max:5000',
            'images.3.product_id'=>'required|integer|'
        ];
    }
}
