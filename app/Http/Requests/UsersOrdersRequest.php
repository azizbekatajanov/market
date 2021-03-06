<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersOrdersRequest extends FormRequest
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
            'first_name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'email'=>'required|max:255|email',
            'address'=>'required|max:255',
            'city'=>'required|max:255',
            'country'=>'required|max:255',
            'zip_code'=>'required|integer',
            'tel'=>'required|max:13|string',
        ];
    }
}
