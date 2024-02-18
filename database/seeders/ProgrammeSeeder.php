<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programmes')->insert([
            ['nom' => 'Perdre du poids'],
            ['nom' => 'Remise en forme'],
            ['nom' => 'Prise de masse'],
            ['nom' => 'Vivre mieux'],
        ]);
        for ($i = 0; $i < 10; $i++) {
            \App\Models\User::factory()->create();
        }
    }
}
