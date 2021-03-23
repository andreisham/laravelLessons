<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:191'],
            'email' => ['sometimes', 'email'],
            'is_admin' => ['sometimes', 'int', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения'
        ];
    }
}
