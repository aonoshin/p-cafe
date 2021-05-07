<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:15',
            'content' => 'max:300',
            'email' => 'required',
            'gender' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => '必須項目です。',
            'name.max:15' => '15文字以内で入力してください。',
            'content.max:300' => '300文字以内で入力してください。',
            'email.required' => '必須項目です。',
            'gender.required' => '必須項目です。',
        ];
    }
}
