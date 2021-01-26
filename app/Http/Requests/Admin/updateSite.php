<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class updateSite extends FormRequest
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
            'url'           => ['required' , 'string'],
            'short'         => ['required' , 'string', 'min:100' , 'max:300'],
            'category_id'   => ['required'],
            'user_id'       => ['required'],
            'activated'     => ['required']
         ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'Названия сайта обязательно к заполнению',
            'title.string'       => 'Названия сайта должно быть строкой',

            'url.required'       => 'Ссылка сайта обязательно к заполнению',
            'url.string'         => 'Ссылка сайта должно быть строкой',

            'short.required'     => 'Описание сайта обязательно к заполнению',
            'short.string'       => 'Описание сайта должно быть строкой',
            'short.min'          => 'Описание сайта минимальное кол-во не мение :min символов',
            'short.max'          => 'Описание сайта вы привысили максимальное число символов, разрешено не более :max символов',

            'category_id.required' => 'Необходимо выбрать категорию',
            'user_id.required'     => 'Необходимо выбрать пользователя',

            'activated.required'   => 'Необходимо выбрать статус активации',
        ];
    }
}
