<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role'  => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email chưa đúng đính dạng @example.com',
            'email.unique' => 'Email này đã có người dùng rồi',
            'password.required' => 'Bạn chưa nhấp mật khẩu',
            'role.required' => 'Bạn chưa chọn vai trò cho người dùng',
        ];
    }
}
