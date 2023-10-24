<?php

namespace App\Http\Requests\User\UserCabinet;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            "name" => ["required", "string", "regex:/\p{Cyrillic}/u"],
            "email" => [
                "required",
                "string",
                "email:rfc,dns",
                "ends_with:.com, .net, .ua",
                "unique:users,email," . $this->user()->id
            ],

            "phone" => ["required", 'regex:/^(?:\+38)?\d{10,10}$/'],
            "profession" => ["required", "string"],
            "area" => ["required", "integer"],
            "avatar" => ["nullable", "image", "max:4096", "mimes:png,jpg,svg"],
            "resume" => ["required", "string"],

        ];

        // Отримати тип користувача
        $userType = $this->user()->type_user_id;

        // Додати умовні правила для відповідних полів
        if ($userType == 1) {
            $rules["resume"] = ["nullable"];
            $rules['phone'] = ['nullable'];
            $rules['profession'] = ['nullable'];
            $rules['area'] = ['nullable'];
            $rules['avatar'] = ['nullable'];
        }

        return $rules;
    }
}
