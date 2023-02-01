<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaculteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Etude::factory(20)->create();
        \App\Models\CentreInteret::factory(20)->create();
        \App\Models\Personnalite::factory(16)->create();
        // \App\Models\Departement::factory(100)->create();

    }
}
