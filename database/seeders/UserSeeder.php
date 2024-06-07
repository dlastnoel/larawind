<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'firstname' => 'Larawind',
            'lastname' => 'Admin',
            'email' => 'admin@larawind.com',
            'status' => 'active',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('admin');

        User::factory(900)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
