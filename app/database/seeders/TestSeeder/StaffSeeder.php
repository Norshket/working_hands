<?php

namespace Database\Seeders\TestSeeder;

use App\Helpers\RoleHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@mail.ru'],
            [
                'name' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]);

        $moderator = User::updateOrCreate(
            ['email' => 'moderator@mail.ru',],
            [
                'name' => 'moderator',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]);

        $admin->assignRole(RoleHelper::ADMIN);
        $moderator->assignRole(RoleHelper::MODERATOR);
    }
}
