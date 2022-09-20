<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email', 'min:5', 'max:255'],
            'url' => ['required', 'url', 'min:5', 'max:255'],
            'description' => ['required', 'string', 'min:5', 'max:255']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя пользователя',
            'phone' => 'Номер телефона',
            'email' => 'Электронная почта',
            'url' => 'Ссылка на ресурс',
            'description' => 'Информации о том, что необходимо'
        ];
    }
}
