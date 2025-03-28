<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|numeric|exists:tags,id',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
