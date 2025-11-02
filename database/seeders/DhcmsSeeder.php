<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DhcmsSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@dhcms.test'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '081234567890'
            ]
        );

        User::updateOrCreate(
            ['email' => 'hr@dhcms.test'],
            [
                'name' => 'HR Officer',
                'password' => Hash::make('password'),
                'role' => 'hr',
            ]
        );

        User::updateOrCreate(
            ['email' => 'manager@dhcms.test'],
            [
                'name' => 'HR Manager',
                'password' => Hash::make('password'),
                'role' => 'manager',
            ]
        );

        User::updateOrCreate(
            ['email' => 'employee@dhcms.test'],
            [
                'name' => 'Employee Demo',
                'password' => Hash::make('password'),
                'role' => 'employee',
            ]
        );
    }
}
