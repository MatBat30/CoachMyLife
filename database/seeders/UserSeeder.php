<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer 10 utilisateurs
        for ($i = 0; $i < 10; $i++) {
            \App\Models\User::factory()->create();
        }
    }
}
