<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('user')->id,
            'password' => 'nullable|min:8',
            'roles' => 'nullable|array',
            'roles.*' => 'required|numeric|exists:roles,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'required|numeric|exists:permissions,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
