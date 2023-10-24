<?php

namespace App\Http\Requests\User\Authorize\RegistrationSolder;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            "name" => ["required", "string", "regex:/\p{Cyrillic}/u"],
            "email" => ["required", "string", "email:rfc,dns", "ends_with:.com, .net, .ua", "unique:users,email"],
            "phone" => ["required", 'regex:/^(?:\+38)?\d{10,10}$/'],
            "profession" => ["required", "string"],
            "area" => ["required", "integer"],
            "password" => ["required", "string", "confirmed"],
            "avatar" => ["nullable", "image", "max:3072", "mimes:png,jpg,svg"],
            "resume" => ["required", "string"],
        ];
    }
}
