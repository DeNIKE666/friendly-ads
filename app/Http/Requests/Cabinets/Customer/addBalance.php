<?php

namespace App\Http\Requests\Cabinets\Customer;

use Illuminate\Foundation\Http\FormRequest;

class addBalance extends FormRequest
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
            'amount' => ['required' , 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'Сумма должна быть обязательно заполнена',
            'amount.numeric'  => 'Сумма должна быть числом',
        ];
    }
}
