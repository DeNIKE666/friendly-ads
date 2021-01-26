<?php

namespace App\Http\Requests\Cabinets\Executor;

use Illuminate\Foundation\Http\FormRequest;

class createSite extends FormRequest
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
            'title'         => ['required' , 'string'],
            'url'           => ['required' , 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/' , 'string'],
            'short'         => ['required' , 'string', 'min:100' , 'max:300'],
            'category_id'   => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'Названия сайта обязательно к заполнению',
            'title.string'         => 'Названия сайта должно быть строкой',

            'url.required'         => 'Ссылка сайта обязательно к заполнению',
            'url.string'           => 'Ссылка сайта должно быть строкой',
            'url.regex'            => 'Некоректный адрес сайта',

            'short.required'       => 'Описание сайта обязательно к заполнению',
            'short.string'         => 'Описание сайта должно быть строкой',
            'short.min'            => 'Описание сайта минимальное кол-во не мение :min символов',
            'short.max'            => 'Описание сайта вы привысили максимальное число символов, разрешено не более :max символов',

            'category_id.required' => 'Необходимо выбрать категорию'
        ];
    }
}
