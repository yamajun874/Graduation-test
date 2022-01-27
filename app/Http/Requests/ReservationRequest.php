<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => 'required|date|after:today',
            'time' => 'required',
            'number' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.date' => '日付の形式で入力してください',
            'date.after' => '翌日以降の日付を入力してください',
            'time.required' => '時間を入力してください',
            'number.required' => '人数を入力してください',
            'number,min' => '1人以上で入力してください'
        ];
    }
}
