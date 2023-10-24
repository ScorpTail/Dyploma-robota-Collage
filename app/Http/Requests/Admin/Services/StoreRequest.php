<?php

namespace App\Http\Requests\Admin\Services;

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
            "title" => ["required", "string"],
            "description" => [
                "required",
                "string",
                function ($attribute, $value, $fail) {
                    // Видаляємо HTML-теги за допомогою регулярного виразу
                    $textWithoutTags = preg_replace("/<.*?>/", "", $value);

                    // Перевіряємо, чи є результат після видалення тегів порожнім
                    if (empty(trim($textWithoutTags))) {
                        $fail('Опис не може містити тільки HTML-теги.');
                    }
                }
            ],
            "price" => ["required", "numeric", "min:1", "max: 2500"],
            "type_work" => ["required", "integer"],
            "is_delivery" => ["nullable", "boolean"],
            "photo" => ["nullable", "array", "max:4"],
            "photo.*" => ["image", "max:4096", "mimes:png,jpg,svg"],
        ];
    }

    //"regex:/^(?:\d{1,3}(?:,\d{3})*|\d+(?:[.,]\d+)?)$/"

    public function messages()
    {
        return [
            "photo" => "Поле з фото не повинно містити більше 4-х фотографій",
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_delivery' => $this->toBoolean($this->is_delivery),
        ]);
    }

    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
