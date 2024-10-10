<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User sudah dibuat

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 10 pengguna secara otomatis
        \App\Models\User::factory(10)->create();
        
        // Atau kamu bisa membuat pengguna secara manual seperti di bawah ini:
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'), // Enkripsi password
        ]);

        User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => bcrypt('123456'),
        ]);

        // Tambahkan lebih banyak pengguna sesuai kebutuhan
    }
}
