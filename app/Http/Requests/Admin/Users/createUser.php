<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class createUser extends FormRequest
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
            'name'         => ['required'],
            'username'     => ['required' , 'unique:users,username'],
            'type_account' => ['required'],
            'email'        => ['required' , 'unique:users,email'],
            'password'     => ['required' , 'min:3'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Имя пользователя обязательно к заполнению',
            'type_account.required' => 'Выберите тип аккаунта',

            'username.required'     => 'Логин пользователя обязательно к заполнению',
            'username.unique'       => 'Такой логин уже занят, попробуйте другой',

            'email.required'        => 'E-mail обязательно к заполнению',
            'email.unique'          => 'Такой e-mail уже занят, попробуйте другой',

            'password.required'     => 'Пароль обязателен к заполнению',
            'password.min'          => 'Пароль слишком короткий минимальное значение :min символов',
        ];
    }
}
