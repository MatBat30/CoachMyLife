<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionExerciceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Exercices')->insert([
            ['nom' => 'sessions 1'],
            ['nom' => 'sessions 2'],
            ['nom' => 'sessions 3'],
            ['nom' => 'sessions 4'],
            ['nom' => 'sessions 5'],
            ['nom' => 'sessions 6'],
            ['nom' => 'sessions 7'],
            ['nom' => 'sessions 8'],
            ['nom' => 'sessions 9'],
            ['nom' => 'sessions 10'],
        ]);

    }
}
