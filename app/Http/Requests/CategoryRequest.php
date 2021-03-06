<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
            return [
                'name'=>"required|max:255|unique:categories,name"
            ];
        }
        if ($this->isMethod('PUT')){
            return [
                'name'=>"required|max:255|unique:categories,name,{$this->category->id}"
            ];
        }
    }
}
