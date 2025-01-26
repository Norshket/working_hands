<?php

namespace App\Http\Resources\Articles;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class IndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'content' => Str::limit($this->content),
            'likes' => $this->likes,
            'views' => $this->views,
        ];
    }
}
