<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:20'],
            'content' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を入力して下さい',
            'name.string' => '名前は文字列で入力して下さい',
            'name.max' => '名前は20字以内で入力して下さい',
            'title.required' => '件名を入力して下さい',
            'title.string' => '件名は文字列で入力して下さい',
            'title.max' => '件名は20字以内で入力して下さい',
            'content.required' => '本文を入力して下さい',
            'content.string' => '本文は文字列で入力して下さい',
            'content.max' => '本文は120字以内で入力して下さい'
        ];
    }
}
