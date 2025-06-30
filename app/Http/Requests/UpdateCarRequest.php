<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
        ];
    }

    public function messages() : array
    {
        return [
            'brand.required'  => 'Marka Alanı Zorunludur',
            'model.required'  => 'Model Alanı Zorunludur',
            'year.required'   => 'Yıl Alanı Zorunludur',
            'daily_price.required' => 'Günlük Fiyat Alanı Zorunludur',
            'transmission_type.required' => 'Şanzıman Türü Zorunludur',
            'fuel_type.required' => 'Yakıt Türü Zorunludur',
            'seat_count.required' => 'Koltuk Sayısı Zorunludur',
            'seat_count.min' => 'Koltuk Sayısı En Az 1 Olmalıdır',
            'luggage_capacity.required' => 'Bagaj Kapasitesi Zorunludur',
            'description.max' => 'Açıklama En Fazla 1000 Karakter Olabilir',
            'year.integer' => 'Yıl Sayısal Bir Değer Olmalıdır',
            'year.min' => 'Yıl En Az 1900 Olmalıdır',
            'year.max' => 'Yıl En Fazla Bu Yıl Olmalıdır',
            'daily_price.numeric' => 'Günlük Fiyat Sayısal Bir Değer Olmalıdır',
            'daily_price.min' => 'Günlük Fiyat Negatif Olamaz',
        ];
    }
}
