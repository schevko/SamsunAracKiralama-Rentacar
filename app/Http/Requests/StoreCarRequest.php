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
            'images.*' => 'image|max:20480'
        ];
    }

    public function messages(): array
    {
        return [
            'brand.required'         => 'Marka Boş Bırakılamaz',
            'model.required'         => 'Model Boş Bırakılamaz',
            'year.required'          => 'Yıl Boş Bırakılamaz',
            'year.integer'           => 'Yıl Sayısal Değer Olmalıdır',
            'year.min'               => 'Yıl 1900\'den Küçük Olamaz',
            'year.max'               => 'Yıl Geçerli Bir Yıl Olmalıdır',
            'daily_price.required'   => 'Günlük Fiyat Boş Bırakılamaz',
            'daily_price.numeric'    => 'Günlük Fiyat Sayısal Değer Olmalıdır',
            'transmission_type.required' => 'Şanzıman Türü Boş Bırakılamaz',
            'fuel_type.required' => 'Yakıt Türü Boş Bırakılamaz',
            'seat_count.required' => 'Koltuk Sayısı Boş Bırakılamaz',
            'seat_count.integer' => 'Koltuk Sayısı Sayısal Değer Olmalıdır',
            'seat_count.min' => 'Koltuk Sayısı En az 1 Olmalıdır',
            'seat_count.max' => 'Koltuk Sayısı En Fazla 15 Olabilir',
            'luggage_capacity.required' => 'Bagaj Kapasitesi Boş Bırakılamaz',
            'luggage_capacity.integer' => 'Bagaj Kapasitesi Sayısal Değer Olmalıdır',
            'luggage_capacity.min' => 'Bagaj Kapasitesi En az 0 Olmalıdır',
            'description.max' => 'Açıklama En Fazla 1000 Karakter Olabilir',
            'is_active.boolean' => 'Aktif Durumu Doğru veya Yanlış Olmalıdır',
            'images.*.image' => 'Her Görsel Bir Resim Dosyası Olmalıdır',
            'images.*.max' => 'Her Görsel En Fazla 20 MB Olabilir'
        ];
    }


}
