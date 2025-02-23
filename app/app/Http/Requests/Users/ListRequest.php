<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\BaseIndexRequest;

class ListRequest extends BaseIndexRequest
{
    public function rules(): array
    {
        return [
                'roles' => 'nullable|array',
                'roles.*' => 'required|numeric|exists:roles,id',
            ] + parent::rules();
    }


    public function authorize(): bool
    {
        return true;
    }
}
