<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'image' => 'nullable|image|max:20480',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ];
    }
    public function messages() : array
    {
        return [
            'title.requird' => 'Başlık Boş Bırakılamaz',
            'title.max'     => 'Başlık En Fazla 255 Karakter Olabilir',
            'content.required' => 'İçerik Boş Bırakılamaz',
            'image.image'     => 'Yüklenen Dosya Bir Resim Olmalıdır',
            'image.max'    => 'Resim Boyutu En Fazla 20 MB Olabilir',
        ];
    }
}
