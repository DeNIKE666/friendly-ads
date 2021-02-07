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
            'title'         => ['required' , 'string'],
            'amount'        => ['required' , 'numeric' , 'min:2500'],
            'description'   => ['required' , 'min:100' , 'max:1000'],
            'type_task'     => ['required'],
            'type_position' => ['required'],
            'category_id'   => ['required'],
            'site_count'    => ['required' , 'numeric', 'between:1,10'],
            'period'        => ['required']
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

            'type_task.required'     => 'Тип задачи должен быть обязательно выбран',
            'type_position.required' => 'Тип позиции размещения должен быть обязательно выбран',
            'category_id.required'   => 'Категория должна быть обязательно выбрана',

            'site_count.required'    => 'Кол-во сайтов обязательно для заполнения',
            'site_count.numeric'     => 'Кол-во сайтов должно быть числом',
            'site_count.between'     => 'Кол-во сайтов не должно привышать :max',

            'period.required'        => 'Необходимо выбрать переод продвижения',
            'period.numeric'         => 'Период продвижения должен быть числом',
        ];
    }
}