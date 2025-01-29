<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateArticleComment implements ShouldQueue
{
    use Queueable;

    private Article $article;
    private array $data;

    public function __construct(Article $article, array $data)
    {
        $this->article = $article;
        $this->data = $data;
    }

    public function handle(): void
    {
        $this->article->comments()->create($this->data);
    }
}
