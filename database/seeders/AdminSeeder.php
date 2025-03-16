<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fname' => 'Super',
                'lname' => 'Admin',
                'name' => 'Superadmin User',
                'email' => 'superadmin@admin.com',
                'password' => 'Superadmin@2023',
                'roles' => ['user', 'writer', 'admin', 'superadmin'],
            ],
            [
                'fname' => 'Just',
                'lname' => 'Admin',
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'Admin@2023',
                'roles' => ['user', 'writer', 'admin'],
            ],
            [
                'fname' => 'Just',
                'lname' => 'Writer',
                'name' => 'Writer',
                'email' => 'writer@admin.com',
                'password' => 'Writer@2023',
                'roles' => ['user', 'writer'],
            ],
            [
                'fname' => 'Just',
                'lname' => 'User',
                'name' => 'User',
                'email' => 'user@admin.com',
                'password' => 'User@2023',
                'roles' => ['user'],
            ],
        ];

        collect($users)->each(function ($userData) {
            $user = User::create([
                'fname' => $userData['fname'],
                'lname' => $userData['lname'],
                'sname' => $userData['sname'] ?? '',
                'name' => $userData['name'],
                'email' => $userData['email'],
                'email_verified_at' => now(),
                'active' => 1,
                'password' => bcrypt($userData['password']),
            ]);

            $user->assignRole($userData['roles']);
        });
    }
}
