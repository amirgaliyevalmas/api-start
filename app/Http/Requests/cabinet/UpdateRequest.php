<?php

namespace App\Http\Requests\cabinet;

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
            'cabinet_name' => 'required',
            'title_kz' => 'required',
            'title_ru' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title_kz.required' => 'Поле “Название кабинета (KZ)” не заполнено',
            'title_ru.required' => 'Поле “Название кабинета (RU)” не заполнено',
            'cabinet_name.required' => 'Поле “Номер кабинета” не заполнено',
        ];
    }
}
