<?php

namespace Database\Seeders\TestSeeder;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::factory(40)->create();
    }
}
