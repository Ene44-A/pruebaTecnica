<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraphs(),
            'color' => $this ->faker->hexColor(),
            'alias' => $this->faker->word(),
            'status' => $this ->faker->randomElement(['Pendiente', 'En Proceso', 'Finalizada']),
            'leader_user' => $this ->faker->randomElement(['Admin', 'User']),
            'initial_date' => $this -> faker->date('Y_m_d'),
            'final_date' => $this -> faker->date('Y_m_d')
        ];
    }
}
