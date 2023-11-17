<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
          'name' => 'Admin',
          'email' => 'admin@gmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('admin'),
          'mode' => 1,
        ]);

        User::create([
          'name' => 'Sandro Nilton',
          'email' => 'sandro91111@gmail.com',
          'email_verified_at' => now(),
          'password' => bcrypt('ABcd12-+'),
          'mode' => 0,
        ]);
    }
}
