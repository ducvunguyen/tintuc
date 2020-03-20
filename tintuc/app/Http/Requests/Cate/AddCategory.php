<?php

namespace App\Http\Requests\Cate;

use Illuminate\Foundation\Http\FormRequest;

class AddCategory extends FormRequest
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
            'name_cat' => 'required',
        ];
    }
    public function messages(){
        return [
            'name_cat.required' => 'Bạn chưa nhập tên thể loại',
        ];
    }
}
