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
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@salon.com',
            'password' => Hash::make('password'),
            'phone' => '0901234567',
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Barber Nguyen',
            'email' => 'barber1@salon.com',
            'password' => Hash::make('password'),
            'phone' => '0902345678',
            'role' => 'barber',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Barber Tran',
            'email' => 'barber2@salon.com',
            'password' => Hash::make('password'),
            'phone' => '0903456789',
            'role' => 'barber',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Customer Le',
            'email' => 'customer1@example.com',
            'password' => Hash::make('password'),
            'phone' => '0904567890',
            'role' => 'customer',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Customer Pham',
            'email' => 'customer2@example.com',
            'password' => Hash::make('password'),
            'phone' => '0905678901',
            'role' => 'customer',
            'status' => 'pending',
            'email_verified_at' => null,
        ]);
    }
}
