<?php

namespace App\Service\ArticleComments;

use App\Http\Database\ListQueryBuilder;
use App\Http\Resources\ArticleComments\ListResource;
use App\Jobs\ArticleComments\CreateArticleComment;
use App\Models\Article;
use App\Models\ArticleComment;

class ArticleCommentServices
{
    private ListQueryBuilder $listBuilder;

    public function __construct(ListQueryBuilder $listBuilder)
    {
        $this->listBuilder = $listBuilder;
    }

    public function getListArticleComment(Article $article, array $params): array
    {
        $query = ArticleComment::query()
            ->where('article_id', $article->id)
            ->orderBy('id', 'desc');

        $this->listBuilder->setParams($query, $params);
        $comments = $this->listBuilder->buildQuery()->get();
        $pagination = $this->listBuilder->buildPagination();

        return [
            'comments' => ListResource::collection($comments),
            'pagination' => $pagination
        ];
    }

    public function create(Article $article, array $data): void
    {
        CreateArticleComment::dispatch($article, $data);
    }

    public function update(ArticleComment $article, array $data): void
    {
        UpdateArticleComment::dispatch($article, $data);
    }
}
