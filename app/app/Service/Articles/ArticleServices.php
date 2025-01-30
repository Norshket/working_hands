<?php

namespace App\Service\Articles;

use App\Http\Database\ListQueryBuilder;
use App\Http\Database\RedisCacher;
use App\Http\Resources\Articles\ListResource;
use App\Models\Article;
use App\Models\Tag;

class ArticleServices
{
    private ListQueryBuilder $listBuilder;
    private RedisCacher $cacher;

    public function __construct(ListQueryBuilder $listBuilder, RedisCacher $cacher)
    {
        $this->listBuilder = $listBuilder;
        $this->cacher = $cacher;
    }

    public function getIndexData(array $params): array
    {
        $data = $this->getArticles($params);
        $tags = Tag::get();

        return [
            'articles' => ListResource::collection($data['articles']),
            'tags' => ListResource::collection($tags),
            'pagination' => $data['pagination']
        ];
    }

    public function getArticles(array $params): array
    {
        $query = Article::query()->orderBy('id', 'desc');

        $this->listBuilder->setParams($query, $params);
        $pagination = $this->listBuilder->buildPagination();

        $cacheKey = 'articles.page.' . $pagination['currentPage'];
        $cacheTags = ['articles.page'];

        $this->cacher->setParams($cacheKey, $cacheTags);

        $articles = $this->cacher->cache($this->listBuilder->buildQuery());

        return [
            'articles' => $articles,
            'pagination' => $pagination
        ];
    }

    public function show(Article $article): Article
    {
        return $article->load('tags');
    }
}
