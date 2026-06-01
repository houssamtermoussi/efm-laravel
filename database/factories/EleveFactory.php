<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Eleve;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Eleve>
 */
class EleveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),

            'prenom' => $this->faker->firstName(),

            'age' => $this->faker->numberBetween(18, 30),

            'classe_id' => Classe::inRandomOrder()->first()->id ,
        ];
    }
}
