<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'daily_price' => 'required|numeric|min:0',
            'transmission_type' => 'required|string|in:manual,automatic',
            'fuel_type' => 'required|string|in:petrol,diesel,electric,hybrid',
            'seat_count' => 'required|integer|min:1|max:10',
            'luggage_capacity' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',
            'is_active' => 'boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048'
        ];
    }
}
