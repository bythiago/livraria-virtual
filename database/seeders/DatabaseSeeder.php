<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => UserRole::Admin,
        ]);

        User::create([
            'name' => 'Usuário',
            'email' => 'user@example.com',
            'password' => 'password',
            'role' => UserRole::User,
        ]);

        $this->call([
            BookSeeder::class,
        ]);
    }
}
