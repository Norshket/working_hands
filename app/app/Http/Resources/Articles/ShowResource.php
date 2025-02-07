<?php

namespace App\Http\Resources\Articles;

use App\Http\Resources\Tags\ListTagResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Article */
class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'likes' => $this->likes,
            'views' => $this->views,
            'tags' => $this->whenLoaded('tags', fn() => ListTagResource::collection($this->tags)),
            'imageUrl' => $this->media?->first()->getFullUrl()
        ];
    }
}
