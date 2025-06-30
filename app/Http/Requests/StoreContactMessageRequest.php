<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreContactMessageRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'isim Boş Bırakılamaz',
            'name.string'   => 'İsim Sayısal Değer İçeremez',
            'name.max'      => 'isim En Fazla 255 Karakter Olabilir',
            'email.required'=> 'E-posta Boş Bırakılamaz',
            'email.email'   => 'Geçerli Bir E-posta Adresi Girin',
            'subject.required' => 'Konu Boş Bırakılamaz',
            'message.required' => 'Mesaj Boş Bırakılamaz',
        ];
    }
}
