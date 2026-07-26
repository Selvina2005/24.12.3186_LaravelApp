<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'superadmin',
                'organization_id' => null,
            ]
        );

        User::firstOrCreate(
            ['email' => 'himati@gmail.com'],
            [
                'name' => 'HIMA Informatika',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'organization_id' => 1,
            ]
        );

        User::firstOrCreate(
            ['email' => 'himasi@gmail.com'],
            [
                'name' => 'HIMA Sistem Informasi',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'organization_id' => 2,
            ]
        );

        User::firstOrCreate(
            ['email' => 'bem@gmail.com'],
            [
                'name' => 'BEM',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'organization_id' => 3,
            ]
        );

        User::firstOrCreate(
            ['email' => 'musik@gmail.com'],
            [
                'name' => 'UKM Musik',
                'password' => Hash::make('password'),
                'role' => 'organizer',
                'organization_id' => 4,
            ]
        );
    }
}