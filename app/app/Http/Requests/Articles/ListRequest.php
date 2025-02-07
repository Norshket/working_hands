<?php

namespace App\Http\Requests\Articles;

use App\Http\Requests\BaseIndexRequest;

class ListRequest extends BaseIndexRequest
{

    public function rules(): array
    {
        return [
                'user_id' => 'nullable|integer|exists:users,id',
            ] + parent::rules();
    }


    public function authorize(): bool
    {
        return true;
    }
}
