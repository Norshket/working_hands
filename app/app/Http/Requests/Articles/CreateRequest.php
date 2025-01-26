<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'tags' => 'nullable|array',
            'tags.*' => 'string|exists:tags,id,deleted_at,NULL',
        ];
    }

    public function authorize(): bool
    {
        return false;
    }
}
