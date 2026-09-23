<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@dismatsn.com'],
            [
                'name' => 'Administrateur DISMAT',
                'password' => Hash::make('dismat2026'),
                'email_verified_at' => now(),
            ]
        );
    }
}
