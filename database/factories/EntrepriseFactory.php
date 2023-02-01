<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company() . ' ' . $this->faker->companySuffix(),
            'rc' => strtoupper($this->faker->numberBetween(2663667)),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'ninea' => strtoupper($this->faker->numberBetween(2663667)),
        ];
    }
}
