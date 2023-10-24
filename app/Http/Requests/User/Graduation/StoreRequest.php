<?php

namespace App\Http\Requests\User\Graduation;

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
            "email" => ["required", "string", "email:rfc,dns", "ends_with:.com, .net, .ua",],
            "phone" => ["required", 'regex:/^(?:\+38)?\d{10,10}$/'],
            "message" => ["required", "string", "max: 400"],
            "photo" => ["nullable", "array", "max:4"],
            "photo.*" => ["image", "max:4096", "mimes:png,jpg,svg"],
        ];
    }

    public function messages()
    {
        return [
            "photo" => "Поле з фото не повинно містити більше 4-х фотографій",
        ];
    }
}
