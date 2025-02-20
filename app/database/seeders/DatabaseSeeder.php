<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeders\PermissionSeeder;
use Database\Seeders\RoleSeeders\RoleSeeder;
use Database\Seeders\TestSeeder\ArticleSeeder;
use Database\Seeders\TestSeeder\StaffSeeder;
use Database\Seeders\TestSeeder\TagSeeder;
use Database\Seeders\TestSeeder\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            StaffSeeder::class,
        ]);

        if (env('APP_ENV') === 'local') {
            $this->call([
                UserSeeder::class,
                TagSeeder::class,
                ArticleSeeder::class,
            ]);
        }
    }
}
