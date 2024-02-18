<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExerciceSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Exercices')->insert([
            ['nom' => 'Push-ups'],
            ['nom' => 'Pull-ups'],
            ['nom' => 'Squats'],
            ['nom' => 'Leg Raises'],
            ['nom' => 'Planks'],
            [ 'nom' => 'Jumping Jacks'],
            [ 'nom' => 'Lunges'],
            [ 'nom' => 'Burpees'],
            [ 'nom' => 'High Knees'],
            [ 'nom' => 'Mountain Climbers']
        ]);

    }
}
