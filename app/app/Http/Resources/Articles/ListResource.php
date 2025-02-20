<?php

namespace App\Http\Resources\Articles;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin Article */
class ListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => Str::limit($this->content, 400),
            'likes' => $this->likes,
            'views' => $this->views,
            'user_id' => $this->user_id,
            'imageUrl' => $this->media?->first()?->getFullUrl()
        ];
    }
}
