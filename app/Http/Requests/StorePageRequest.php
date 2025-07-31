<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'is_active' => 'boolean'
        ];
    }
    public function messages() : array
    {
        return [
            'title.required' => 'Başlık Alanı Boş Bırakılamaz',
            'slug.required'  => 'Slug Alanı Boş Bırakılamaz',
            'slug.unique'    => 'Bu Slug Zaten Kullanılıyor',
            'content.required' => 'içerik Alanı Boş Bırakılamaz',
        ];
    }
}
