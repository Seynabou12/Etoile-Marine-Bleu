<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Run code for profils
        DB::table("profils")->insertOrIgnore([
            [
                "id" => 1,
                "name" => "Administrateur",
            ],
            [
                "id" => 2,
                "name" => "Utilisateur",
            ],
        ]);

        User::create([
            'name' => 'Administrateur',
            'email' => 'dioneseynabou0@gmail.com',
            'password' => Hash::make("password"),
            
        ]);

        \App\Models\User::factory(2)->create();
        \App\Models\Collaborateur::factory(2)->create();
        \App\Models\Role::factory(2)->create();

    }
}
