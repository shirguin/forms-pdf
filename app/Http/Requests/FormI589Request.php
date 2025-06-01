<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormI589Request extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email Address',
        ];
    }
        public function messages(): array
    {
        return [
            'name.required' => 'Поле Ваше имя обязательно для заполнения.',
            'name.string' => 'Поле Ваше имя должно быть строкой.',
            'name.min' => 'Поле Ваше имя должно содержать не менее :min символов.',
            'name.max' => 'Поле Ваше имя должно содержать не более :max символов.',
            'email.required' => 'Поле Email обязательно для заполнения.',
            'email.email' => 'Поле Email должно содержать корректный адрес электронной почты.',
        ];
    }
}
