<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFilmRequest extends FormRequest
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
            'year' => 'required|integer|between:1900,3000',
            'desc' => 'required|min:30|max:255',
            'genre' => 'required',
            'actors' => 'regex:/^([а-яА-ЯЁё\s]+,)*[а-яА-ЯЁё\s]+$/u',
            'img' => 'image',
            'banner' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Параметр :attribute обязателен'
        ];
    }


}
