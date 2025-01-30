<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{

    /**
     * Indicate that the user is suspended.
     */
    public function configure(): Factory
    {
        return $this->afterCreating(function (Article $article) {
            ArticleComment::factory()->state(['article_id' => $article->id])->count(4)->create();
            $tags = Tag::factory()->count(2)->create()->pluck('id');
            $article->tags()->attach($tags);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10),
            'content' => $this->faker->text(5000),
            'likes' => rand(1, 100),
            'views' => rand(1, 100),
        ];
    }
}
