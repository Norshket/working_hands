<?php

namespace Database\Seeders\TestSeeder;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::factory()->count(40)->create();
    }
}
