<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'post_id' => 'required',
            'content' => 'required',
        ];
    }

    public function messages(){
        return [
            'post_id.required' => 'Bạn chưa chọn tên bài viết',
            'content.required' => 'Bạn chưa nhập bình luận',
            
        ];
    }
}
