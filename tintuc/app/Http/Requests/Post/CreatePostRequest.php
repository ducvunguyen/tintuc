<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'image' => 'required|mimes:jpeg,bmp,png',
            'category' => 'required',
            'content' => 'required',
        ];
    }

    public function messages(){
        return [
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.mimes' => 'Bạn chưa đúng định dạng file ảnh',
            'category.requird' => 'Bạn chưa chọn thể loại',
            'content.required' => 'Bạn chưa có nội dụng bài viết, mời nhập lại',
        ];
    }
}
