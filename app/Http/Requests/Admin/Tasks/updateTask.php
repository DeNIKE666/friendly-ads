<?php

namespace App\Http\Requests\Admin\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class updateTask extends FormRequest
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
            'title'              => ['required' , 'string'],
            'amount'             => ['required' , 'numeric' , 'min:10'],
            'description'        => ['required' , 'min:100' , 'max:300'],
            'full_description'   => ['required' , 'min:100' , 'max:300'],
            'category_id'        => ['required'],
            'site_count'         => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'              => 'Название задания обязательно к заполнению',
            'title.string'                => 'Название задания должно быть строкой',

            'amount.required'             => 'Минимальная сумма обязательно к заполнению',
            'amount.numeric'              => 'Минимальная сумма должна быть числом',
            'amount.min'                  => 'Минимальная сумма не должна быть менее :min руб',

            'description.required'        => 'Описание задачи обязательно к заполнению',
            'description.min'             => 'Описание задачи не должна быть менее :min символов',
            'description.max'             => 'Описание задачи не должно привышать :max символов',

            'full_description.required'   => 'Описание задачи обязательно к заполнению',
            'full_description.min'        => 'Описание задачи не должна быть менее :min символов',
            'full_description.max'        => 'Описание задачи не должно привышать :max символов',

            'category_id.required'        => 'Категория должна быть обязательно выбрана',

            'site_count.required'         => 'Кол-во сайтов обязательно для заполнения',

            'selectedOptions.required'    => 'Необходимо выбрать опции заказа',

        ];
    }
}
