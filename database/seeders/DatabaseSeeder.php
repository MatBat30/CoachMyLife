<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Programme;
use Illuminate\Database\Seeder;
use Workbench\App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Programme::factory(10)->create();

        $programmesIds = Programme::all()->pluck('id')->toArray();

        User::factory(10)->create()->each(function ($user) use ($programmesIds) {
            $user->programme_id = $this->faker->randomElement($programmesIds);
            $user->save();
        });

    }
}
