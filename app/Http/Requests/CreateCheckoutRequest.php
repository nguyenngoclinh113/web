<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCheckoutRequest extends FormRequest
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
            'address' => 'required|min:15',
            'phone' => 'required|min:10|max:12',
            'note'=>'required|min:15',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên phải 3 ký tự trở lên',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ phải trên 15 ký tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.min' => 'Số điện thoại ít nhất 10 ký tự',
            'phone.max' => 'Số điện thoại chỉ được 10 ký tự',
            'note.required' => 'Bạn chưa nhập ghi chú',
            'note.min' => 'Ghi chú phải từ 15 ký tự',
        ];
    }
}
