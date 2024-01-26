<?php

namespace App\Http\Requests;

use App\Models\Apartment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApartmentCreateRequest extends FormRequest
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
            "name" => "required|string|max:50",
            "rooms" => "required|numeric|min:1|max:10",
            "beds" => "required|numeric|min:1|max:10",
            "bathrooms" => "required|numeric|min:1|max:10",
            "mq" => "required|numeric|min:10|max:5000",
            "address" => "required|string|max:100",
            "lat" => "required|numeric|regex:/^\d{1,2}(\.\d{1,8})?$/",
            "lon" => "required|numeric|regex:/^\d{1,2}(\.\d{1,8})?$/",
            "photo" => "required|image|file",
            "visible" => "required|boolean",
            "services" => "required",
        ];
    }
}
