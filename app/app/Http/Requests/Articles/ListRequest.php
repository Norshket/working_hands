<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => 'nullable|integer|min:1',
            'limit' => 'nullable|integer|min:1',
        ];
    }

    public function authorize(): bool
    {
        return false;
    }
}
