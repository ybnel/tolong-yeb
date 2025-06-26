<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Role; // <-- Tambahkan ini
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan roles sudah ada. Jika RolesTableSeeder jalan duluan, ini aman.
        $adminRole = Role::where('name', 'admin')->first(); // Sesuaikan 'Admin' dengan nama role yang kamu buat
        $customerRole = Role::where('name', 'user')->first(); // Sesuaikan 'User' dengan nama role yang kamu buat

        // Membuat Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@bioskop.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id, // Ambil ID dari objek Role
        ]);

        // Membuat Customer
        User::create([
            'name' => 'Rey Customer',
            'email' => 'rey@customer.com',
            'password' => Hash::make('password'),
            'role_id' => $customerRole->id, // Ambil ID dari objek Role
        ]);

        // Membuat beberapa customer lain menggunakan factory
        // Pastikan factory ini juga mengassign role_id
        User::factory(10)->create([
            'role_id' => $customerRole->id, // Pastikan factory juga pakai role_id ini
        ]);
    }
}