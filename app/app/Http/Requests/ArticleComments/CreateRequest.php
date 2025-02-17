<?php

namespace App\Http\Requests\ArticleComments;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
