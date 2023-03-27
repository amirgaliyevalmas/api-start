<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_kz' => 'required',
            'title_ru' =>  'required',
            'department_id' => 'integer'
        ];
    }

    public function messages(): array
    {
        return [
            'title_kz.required' => 'Поле “Название отделения (KZ)” не заполнено',
            'title_ru.required' => 'Поле “Название отделения (RU)” не заполнено',
        ];
    }
}
