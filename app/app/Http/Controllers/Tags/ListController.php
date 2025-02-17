<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tags\ListTagResource;
use App\Repositories\Tags\TagRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ListController extends Controller
{
    public function __invoke(TagRepository $tagRepository): JsonResource
    {
        return ListTagResource::collection($tagRepository->tagQuery()->get());
    }
}
