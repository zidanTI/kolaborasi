<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        #arahkan dulu dia dimana
        \App\Models\pasien::factory(100)->create();
        \App\Models\poli::factory(100)->create();
        \App\Models\Mahasiswa::factory(100)->create();
        \App\Models\Daftar::factory(100)->create();
    }
}
