<?php

namespace App\Http\Requests;

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
            'title' => 'required|max:40',
            'content' => 'required|max:200',
            'face' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => '必須項目です。',
            'title.max:40' => '40文字以内で入力してください。',
            'content.required' => '必須項目です。',
            'content.max:200' => '200文字以内で入力してください。',
            'face.required' => '必須項目です。',
        ];
    }
}
