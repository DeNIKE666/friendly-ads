<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class updateUser extends FormRequest
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
            'username'     => ['required'],
            'type_account' => ['required'],
            'email'        => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Имя пользователя обязательно к заполнению',
            'username.required'     => 'Логин пользователя обязательно к заполнению',
            'type_account.required' => 'Выберите тип аккаунта',
            'email.required'        => 'E-mail обязательно к заполнению',
        ];
    }
}
