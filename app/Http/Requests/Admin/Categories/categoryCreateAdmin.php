<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class categoryCreateAdmin extends FormRequest
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
            'name'      => ['required' , 'min:1'],
            'parent_id' => ['exists:categories,id' , 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя категории обязательно к заполнению',
            'name.min'      => 'Имя категории должно содержать не мение :min символов'
        ];
    }
}
