<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            "name" => "string|required|unique:menus,name,NULL,id,deleted_at,NULL",
            "icon" => "string|required",
            "link" => "string|required",
            "menu_type_id" => "required|exists:menu_types,id|integer"
        ];
    }
}
