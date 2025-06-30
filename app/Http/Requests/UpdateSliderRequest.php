<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'image' => 'nullable|image|max:20480',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Resim Dosyası Olmalıdır',
            'title.string' => 'Başlık Metin Olmalıdır',
            'description.string' => 'Açıklama Metin Olmalıdır',
            'link.string' => 'Link Metin Olmalıdır',
            'order.required' => 'Sıra Alanı Zorunludur',
            'order.integer' => 'Sıra Sayısal Bir Değer Olmalıdır',
            'order.min' => 'Sıra En Az 0 Olmalıdır',
        ];
    }
}
