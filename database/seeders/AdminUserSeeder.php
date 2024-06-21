<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AppUser; // Add this line to import the AppUser model

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add default admin user if it doesn't exist
        if (!AppUser::where('username', 'admin')->exists()) {
            AppUser::create([
                'username' => 'admin',
                'email' => 'admin@blacklistsellers.com',
                'password' => Hash::make('000000000'),
                'role' => 'admin', // Set the role to admin
            ]);
        }
    }
}
