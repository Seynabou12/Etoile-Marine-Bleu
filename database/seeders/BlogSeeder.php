<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create()
            ->each(function($u) {
                $u->blog()
                ->saveMany(
                    \App\Models\Blog::factory(3)->make()
            );
        });
    }
}
