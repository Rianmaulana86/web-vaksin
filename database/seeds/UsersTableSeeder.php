<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan ini mengarah ke model User yang benar

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
        User::factory(10)->create();
        
        // Membuat pengguna secara manual
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
    }
}
