<?php

namespace App\Http\Requests\Admin\User;

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
            "name" => ["required", "string", "regex:/\p{Cyrillic}/u"],
            "email" => [
                "required",
                "string",
                "email:rfc,dns",
                "ends_with:.com, .net, .ua",
                "unique:users,email," . $this->user->id
            ],
            "phone" => ["required", 'regex:/^(?:\+38)?\d{10,10}$/'],
            "role_id" => ["required", "integer"],
        ];
    }

    public function messages()
    {
        return [
            "required" => "Поле є обов'язковим",
            "string" => "Поле повинно містити букви та цифри",
            "regex:/\p{Cyrillic}/u" => "Поле приймає тільки кирилицю",
            "email" => "Поле повинно містити @example.com",
            "unique" => "Дана адреса поштової скринький зайнята",
            "integer" => "Поле приймає тільки цілі числа",
        ];
    }
}
