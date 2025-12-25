<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:50|regex:/^[а-яА-ЯёЁa-zA-Z\s]+$/u',
            'last_name' => 'required|string|max:50|regex:/^[а-яА-ЯёЁa-zA-Z\s]+$/u',
            'full_name' => 'sometimes',
            'login' => 'required|string|min:3|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'phone' => 'required|regex:/^\+7\d{3}\d{3}\d{2}\d{2}$/|unique:users',
            'password' => 'required|string|min:6|confirmed', 
        ];
    }

    public function messages(): array 
    {
      return [
      'first_name.regex' => 'Имя может содержать только буквы и пробелы',
      'login.unique' => 'Этот логин уже занят',
      'email.unique' => 'Эта почта уже занята',
      'password.min' => 'Пароль должен содержать минимум 6 символов',
      'phone.regex' => 'Телефон должен быть в формате +7XXX-XXX-XX-XX',
      'phone.unique' => 'Этот телефон уже занят',
      'password.confirmed' => 'Пароли не совпадают',
      ];
    }

    protected function passedValidation(): void 
    {
      $this->merge([
      'full_name'=> $this->first_name . ' ' . $this->last_name
      ]);
    }
}
