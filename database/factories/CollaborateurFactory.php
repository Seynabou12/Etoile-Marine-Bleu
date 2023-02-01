<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CollaborateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'user_id'=> rand(1,2)
        ];
    }
}
