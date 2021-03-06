<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->isMethod('POST')){
            $name = "required|max:255|unique:products,name";
        }
        if ($this->isMethod('PUT')){
            $name = "required|max:255|unique:products,name,{$this->product->id}";
        }
        return [
            'name'=>$name,
            'price'=>'required|integer',
            'old_price'=>'integer',
            'quantity'=>'required|integer',
            'brand_id'=>'integer',
            'category_id'=>'integer'
        ];
    }
}
