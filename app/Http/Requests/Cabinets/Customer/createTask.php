<?php

namespace App\Http\Requests\Cabinets\Customer;

use Illuminate\Foundation\Http\FormRequest;

class createTask extends FormRequest
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
            'amount'             => ['required' , 'numeric' , 'min:100'],
            'description'        => ['required' , 'min:100' , 'max:1000'],
            'full_description'   => ['required' , 'min:100' , 'max:3000'],
            'category_id'        => ['required'],
            'site_count'         => ['required'],
            'options_select'     => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required'         => 'Название задания обязательно к заполнению',
            'title.string'           => 'Название задания должно быть строкой',

            'amount.required'        => 'Минимальная сумма обязательно к заполнению',
            'amount.numeric'         => 'Минимальная сумма должна быть числом',
            'amount.min'             => 'Минимальная сумма не должна быть менее :min руб',

            'description.required'   => 'Описание задачи обязательно к заполнению',
            'description.min'        => 'Описание задачи не должна быть менее :min символов',
            'description.max'        => 'Описание задачи не должно привышать :max символов',

            'category_id.required'   => 'Категория должна быть обязательно выбрана',

            'site_count.required'    => 'Кол-во сайтов обязательно нужно выбрать',

            'options_select.required'        => 'Необходимо выбрать опции заказа'
        ];
    }
}
