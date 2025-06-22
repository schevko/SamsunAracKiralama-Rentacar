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
            'image' => 'nullable|image|max:5096',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ];
    }
}
