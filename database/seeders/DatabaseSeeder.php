<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ini seeder bawaan breeze / laravel
        // kita bikin aman supaya kalau sudah ada, dia tidak duplicate
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );

        // seeder kamu sendiri untuk 4 role
        $this->call(DhcmsSeeder::class);
    }
}
