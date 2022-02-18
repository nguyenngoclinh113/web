<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSignInRequest extends FormRequest
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
            //
            'Email' => 'required',
            'Password' => 'required|min:5|max:15',
        ];
    }
    public function messages()
    {
        return [
            'Email.required' => 'Bạn chưa nhập Email',
            'Password.required' => 'Bạn chưa nhập Password',
            'Password.min' => 'Password không nhỏ hơn 5 ký tự',
            'Password.max' => 'Password không được quá 15 ký tự',
        ];
    }
}
