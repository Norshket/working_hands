<?php

namespace App\Repositories\Articles;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;

class ArticleRepository
{
    public function listQuery(array $params = []): Builder
    {
        $query = Article::query()->orderBy('id', 'desc');

        if (isset($params['tags'])) {
            $query->whereHas('tags', fn($query) => $query->whereIn('tags.id', $params['tags']));
        }

        if (isset($params['user_id'])) {
            $query->where('user_id', $params['user_id']);

        }

        return $query;
    }
}
