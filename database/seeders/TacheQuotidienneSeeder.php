<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\TacheQuotidienne;

class TacheQuotidienneSeeder extends Seeder
{
    public function run()
    {
        $tachesQuotidiennes = [
            'faire 3 séries de 10 pompes',
            'courir pendant 15 minutes',
            'ne pas manger de sucrerie',
            'ne pas grignoter entre les repas',
            'faire 3 séries de 15 squats',
            'me coucher avant minuit',
            'ne pas manger de friture',
            'boire 1,5L d\'eau',
            'éviter les boissons sucrées',
            'dormir 8h par nuit',
            'ne pas manger de gras le soir'
        ];

        User::all()->each(function ($user) use ($tachesQuotidiennes) {
            foreach ($tachesQuotidiennes as $tache) {
                TacheQuotidienne::create([
                    'user_id' => $user->id,
                    'nom' => $tache,
                    'status' => 0,
                ]);
            }
        });
    }
}
