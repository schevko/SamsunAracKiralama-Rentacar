<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'image' => 'required|image|max:20480',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'required|integer|min:0',
        ];
    }

    public function messages() : array
    {
        return [
            'image.required' => 'Resim Yüklemek Zorunludur',
            'image.image'    => 'Yüklenen Dosya Resim Olmalıdır',
            'image.max'      => 'Resim Boyutu En Fazla 20 MB Olmalıdır',
            'title.string'   => 'Başlık Metin Olmalıdır',
            'description.string' => 'Açıklama Metin Olmalıdır',
            'link.string'    => 'Link Metin Olmalıdır',
            'order.required' => 'Sıra Zorunludur',
            'order.integer'  => 'Sıra Tam Sayı Olmalıdır',
            'order.min'    => 'Sıra En Az 0 Olmalıdır',
        ];
    }
}
