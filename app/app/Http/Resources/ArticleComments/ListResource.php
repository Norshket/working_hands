<?php

namespace App\Http\Resources\ArticleComments;

use App\Models\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/** @mixin ArticleComment */
class ListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'message' => $this->message,
        ];
    }
}
