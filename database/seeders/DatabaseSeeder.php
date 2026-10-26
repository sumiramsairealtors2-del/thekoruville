<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account for the local admin panel.
        User::updateOrCreate(
            ['email' => 'admin@thekoruville.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ],
        );

        // Real blog posts (captured from the live site).
        $this->call(RealPostSeeder::class);
    }
}
