<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserUpdateRequest extends FormRequest
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
            'name' => 'required|min:3',
            'address' => 'required|min:15',
            'phone' => 'required|min:10|max:15',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên ',
            'name.min' => 'Tên phải có ít nhât 3 ký tự',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ phải trên 15 ký tự',
            'phone.required' => 'Bạn chưa nhập điện thoại',
            'phone.min' => 'Địa thoại phải từ 10 số',
            'phone.max' => 'Địa thoại tối đa 15 số',
        ];
    }
}
