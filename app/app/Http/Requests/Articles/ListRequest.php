<?php

namespace App\Http\Requests\Articles;

use App\Http\Requests\BaseIndexRequest;

class ListRequest extends BaseIndexRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
