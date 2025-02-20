<?php

namespace Database\Factories;

use App\Helpers\RoleHelper;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\Tag;
use App\Models\User;
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
            $tags = Tag::inRandomOrder()->limit(2)->get()->pluck('id')->toArray();
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
        $user = User::whereHas('roles', fn($query) => $query->where('name', RoleHelper::USER))
            ->inRandomOrder()
            ->first();

        return [
            'title' => $this->faker->text(10),
            'content' => $this->faker->text(5000),
            'user_id' => $user->id,
            'likes' => rand(1, 100),
            'views' => rand(1, 100),
        ];
    }
}
