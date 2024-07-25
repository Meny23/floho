<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => "required|string|max:255",
            "surname" => "required|string|max:255",
            "second_surname" => "nullable|string|max:255",
            "email" => $this->method() == "POST" ? "required|email|unique:users,email,NULL,id,deleted_at,NULL" : "email|required",
            "device_name" => "string|required",
            "password" => $this->method() == "POST" ? "required|confirmed|min:8" : "nullable"
        ];
    }
}
