<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChangePasswordRequest extends FormRequest
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
            'password' => 'required|min:5|max:15',
            'cpassword' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhât 5 ký tự',
            'password.max' => 'Mật khẩu chỉ được tối đa 15 ký tự',
            'cpassword.required' => 'Bạn chưa nhập lại mật khẩu',
            'cpassword.same' => 'Mật khẩu nhập lại chưa khớp',
        ];
    }
}
