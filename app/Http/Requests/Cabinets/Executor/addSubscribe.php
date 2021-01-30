<?php

namespace App\Http\Requests\Cabinets\Executor;

use Illuminate\Foundation\Http\FormRequest;

class addSubscribe extends FormRequest
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
            'id'    => ['required' , 'exists:tasks,id'],
            'sites' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'id.required'      => 'Не передано задание',
            'id.exists'        => 'Такого задания нет в системе',

            'sites.required'   => 'Сайты не выбраны',
        ];
    }
}
