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
            'min_sum'       => ['required' , 'numeric' , 'min:500'],
            'max_sum'       => ['required' , 'numeric', 'gt:min_sum'],
            'description'   => ['required' , 'min:100' , 'max:1000'],
            'type_task'     => ['required'],
            'type_position' => ['required'],
            'category_id'   => ['required'],
            'site_count'    => ['required' , 'numeric' , 'min:10'],
            'period'        => ['required' , 'numeric' , 'min:1']
        ];
    }

    public function messages()
    {
        return [
            'title.required'         => 'Название задания обязательно к заполнению',
            'title.string'           => 'Название задания должно быть строкой',

            'min_sum.required'       => 'Минимальная сумма обязательно к заполнению',
            'min_sum.numeric'        => 'Минимальная сумма должна быть числом',
            'min_sum.min'            => 'Минимальная сумма не должна быть менее :min руб',

            'max_sum.required'       => 'Максимальная сумма обязательно к заполнению',
            'max_sum.numeric'        => 'Максимальная сумма должна быть числом',
            'max_sum.gt'             => 'Максимальная сумма должна быть больше минимальной',

            'description.required'   => 'Описание задачи обязательно к заполнению',
            'description.min'        => 'Описание задачи не должна быть менее :min символов',
            'description.max'        => 'Описание задачи не должно привышать :max символов',

            'type_task.required'     => 'Тип задачи должен быть обязательно выбран',
            'type_position.required' => 'Тип позиции размещения должен быть обязательно выбран',
            'category_id.required'   => 'Категория должна быть обязательно выбрана',

            'site_count.required'    => 'Кол-во сайтов обязательно для заполнения',
            'period.required'        => 'Необходимо выбрать переод продвижения',
        ];
    }
}
