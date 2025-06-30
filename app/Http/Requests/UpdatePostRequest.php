<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $postid = $this->route('post')->id;
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:posts,slug,' . $postid,
            'summary' => 'nullable|string',
            'image' => 'nullable|image|max:20480',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ];
    }

    public function messages() : array
    {
        return [
            'title.required' => 'Başlık Alanı Zorunludur',
            'title.string' => 'Başlık Alanı Metin Olmalıdır',
            'title.max' => 'Başlık En Fazla 255 Karakter Olabilir',
            'content.required' => 'İçerik Alanı Zorunludur',
            'content.string' => 'İçerik Alanı Metin Olmalıdır',
            'slug.required' => 'Slug Alanı Zorunludur',
            'slug.string' => 'Slug Alanı Metin Olmalıdır',
            'slug.unique' => 'Bu Slug Daha Önce Kullanılmış',
            'summary.string' => 'Özet Alanı Metin Olmalıdır',
            'image.image' => 'Resim Dosyası Olmalıdır',
            'image.max' => 'Resim En Fazla 20 MB Olabilir',
            'published_at.date' => 'Yayınlanma Tarihi Geçerli Bir Tarih Olmalıdır'
        ];
    }
}
