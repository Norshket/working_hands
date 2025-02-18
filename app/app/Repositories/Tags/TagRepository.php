<?php

namespace App\Repositories\Tags;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class TagRepository
{

    public function listQuery(array $params = []): Builder
    {
        return Tag::query()->orderBy('id', 'desc');
    }

}
