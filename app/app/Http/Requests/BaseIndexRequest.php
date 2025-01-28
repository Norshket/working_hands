<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'limit' => 'nullable|integer|min:1',
            'offset' => 'nullable|integer|min:0',
        ];
    }
}
