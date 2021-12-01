<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username'=>'required|max:255|unique:users,username',
            'first_name'=>'required|max:255|string',
            'last_name'=>'nullable|max:255|string',
            'email'=>'required|max:255|email|unique:users,email',
            'password'=>'required|confirmed|min:8',
//            'avatar'=>'nullable|image|mimes:jpg,jpeg,bmp,svg,png|max:5000'
        ];
    }
}
