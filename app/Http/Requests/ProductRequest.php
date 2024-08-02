<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProductRequest extends FormRequest
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
            "category_id" => "integer|required|exists:categories,id",
            "description" => "string|required",
            "image" => "nullable|image",
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);

        $product_id = Product::max("id") + 1;
        $validated["code"] = str_pad($product_id, 6, 0, STR_PAD_LEFT);

        $image = $this->file("image");

        if ($image) {
            $link = "images/products";
            $name = strtolower(str_replace(" ", "", $this->name)) . "." . $image->extension();

            $validated["image"] = Storage::putFileAs($link, $image, $name);
        }

        return $validated;
    }
}
