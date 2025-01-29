<?php

namespace App\Http\Requests\ArticleComments;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
