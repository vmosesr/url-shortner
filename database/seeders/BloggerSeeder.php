<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserRole; // Ensure UserRole is correctly imported
use Illuminate\Support\Facades\Hash;

class BloggerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Blogger',
            'email' => 'blogger@gmail.com',
            'role' => UserRole::Blogger,
            'password' => Hash::make("123456789")
        ]);
    }
}
