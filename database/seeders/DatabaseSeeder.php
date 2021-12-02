<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Matthieu',
            'email' => 'matthieu@boxydev.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Fiorella',
            'email' => 'fiorella@boxydev.com',
        ]);

        Office::factory(10)->create();
    }
}
