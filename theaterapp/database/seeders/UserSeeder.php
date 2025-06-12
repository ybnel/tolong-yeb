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
        // Membuat Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@bioskop.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // Asumsi ID 1 adalah Admin
        ]);

        // Membuat Customer
        User::create([
            'name' => 'Rey Customer',
            'email' => 'rey@customer.com',
            'password' => Hash::make('password'),
            'role_id' => 2, // Asumsi ID 2 adalah Customer
        ]);
        
        // Membuat beberapa customer lain menggunakan factory
        User::factory(10)->create();
    }
}
