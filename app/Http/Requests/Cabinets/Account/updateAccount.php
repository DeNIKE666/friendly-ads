<?php

namespace App\Http\Requests\Cabinets\Account;

use Illuminate\Foundation\Http\FormRequest;

class updateAccount extends FormRequest
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
            'name'     => ['required' , 'string'],
            'email'    => ['required' , 'string' , 'unique:users,email,' . $this->user()->id],
            'username' => ['required' , 'string' , 'unique:users,username,' . $this->user()->id],
            'about_me' => ['max:500']
        ];
    }

    public function messages()
    {
        return [

            'name.required'     => 'Имя должно быть обязательно заполнено',
            'name.string'       => 'Имя должно быть строкой',

            'email.required'    => 'Email должен быть обязательно заполнен',
            'email.string'      => 'Email должен быть строкой',
            'email.unique'      => 'Данный Email уже кем-то занят',

            'username.required' => 'Имя пользователя должно быть обязательно заполнено',
            'username.string'   => 'Имя пользователя должно быть строкой',
            'username.unique'   => 'Это имя пользователя уже кем-то занято',

            'about_me.max' => 'Информация о себе привышает допустимое число слов, разрешено не более :max символов',
        ];
    }
}
