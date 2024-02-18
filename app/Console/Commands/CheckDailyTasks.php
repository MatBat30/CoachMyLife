<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CheckDailyTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:check';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vérifie les tâches quotidiennes de chaque utilisateur';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $completedTasks = $user->taches()->whereDate('created_at', now()->toDateString())->where('status', 1)->count();
            if ($completedTasks == $user->taches()->count()) {
                $user->points += 100; // Ajoutez 100 points si toutes les tâches sont complétées

                // Mettez à jour le statut en fonction des points
                if ($user->points >= 1000) {
                    $user->status = 'Athlète';
                } elseif ($user->points >= 700) {
                    $user->status = 'Toujours plus ferme';
                } elseif ($user->points >= 300) {
                    $user->status = 'Adepte de l\'effort';
                }

                $user->save();
            }
        }

        $this->info('Les tâches quotidiennes ont été vérifiées et les points attribués.');
    }
}
