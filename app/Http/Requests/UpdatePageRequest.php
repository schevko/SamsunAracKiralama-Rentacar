<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
        $pageid = $this->route('page')->id;
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $pageid,
            'content' => 'required|string',
            'is_active' => 'boolean'
        ];
    }

    public function messages() : array
    {
        return [
            'title.required' => 'Başlık Alanı Zorunludur',
            'title.string'  => 'Başlık Alanı Metin Olmalıdır',
            'title.max'    => 'Başlık Alanı En Fazla 255 Karakter Olabilir',
            'slug.required'  => 'Slug Alanı  Zorunludur',
            'slug.string'  => 'Slug Alanı Metin Olmalıdır',
            'slug.max'    => 'Slug Alanı En Fazla 255 Karakter Olabilir',
            'slug.unique' => 'Bu Slug Daha Önce Kullanılmış',
            'content.required' => 'İçerik Alanı Zorunludur',
            'content.string' => 'İçerik Alanı Metin Olmalıdır',
        ];
    }
}
