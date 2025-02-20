<?php

namespace Database\Seeders\TestSeeder;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(40)->create();
    }
}
