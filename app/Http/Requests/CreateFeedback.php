<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeedback extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10|max:255',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заголовок обязателен',
            'title.min' => 'Слишком короткий заголовок',
            'title.max' => 'Слишком длинный заголовок',
            'content.required'  => 'Текст обращения обязателен',
        ];
    }
}
