<?php

namespace App\Http\Requests\ArticleComments;

use App\Http\Requests\BaseIndexRequest;
use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends BaseIndexRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
