<?php

namespace App\Http\Requests\News;

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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'author' => ['nullable', 'string', 'min:3', 'max:35'],
            'status' => ['required', 'string', 'min:5', 'max:7'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg, png, jpg']
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => 'Выбрать категорию',
            'title' => 'Заголовок',
            'author' => 'Автор',
            'status' => 'Статус',
            'description' => 'Описание',
            'image' => 'Изображение'
        ];
    }

    public function messages(): array
    {
        return [
            'min' => [
                'string'  => 'Поле :attribute должно быть не меньше :min.',
            ]
        ];
    }
}
