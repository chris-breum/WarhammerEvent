<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@warhammer.dk',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'user@warhammer.dk',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
