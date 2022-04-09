<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserSignUpRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:15',
            'cpassword'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên phải 3 ký tự trở lên',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email này đã tồn tại trên hệ thống',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Password phải từ 5 ký tự',
            'password.max' => 'Password tối đa 15 ký tự',
            'cpassword.required' => 'Bạn chưa nhập lại password',
            'cpassword.same' => 'Password nhập lại chưa khớp',
        ];
    }
}
