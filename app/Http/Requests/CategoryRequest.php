<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CategoryRequest extends FormRequest
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
            "name" => $this->method() == "POST" ? "required|string" : "nullable|string",
            "description" => "string|nullable",
            "image" => "nullable|image"
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);
        $image = $this->file("image");
        
        if ($image) {
            $link = "images/categories";
            $name = strtolower(str_replace(" ", "", $this->name)) . "." . $image->extension();

            $validated["image"] = Storage::putFileAs($link, $image, $name);
        }

        return $validated;
    }
}
