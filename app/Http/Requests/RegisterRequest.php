<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'unique:users,username|min:6|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'min:6',
            're_password' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'username.min' => 'Tên tài khoản phải dài ít nhất 6 ký tự',
            'username.regex' => 'Tài khoản không thể chứa ký tự đặc biệt',
            'password.min' => 'Mật khẩu phải dài ít nhất 6 ký tự',
            're_password.same' => 'Xác nhận mật khẩu không trùng khớp'
        ];
    }
}
