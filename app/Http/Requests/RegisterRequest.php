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
            'name' => 'required|string|max:191',
            'email' => 'required|email|string|unique:users|max:191',
            'password' => 'required|max:191|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '文字で入力してください',
            'name.max' => '191字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.string' => '文字で入力してください',
            'email.unique' => 'メールアドレスは重複しないでください',
            'email.max' => '191字以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.max' => '191字以内で入力してください',
            'password.min' => '8文字以上で入力してください'
        ];
    }
}
