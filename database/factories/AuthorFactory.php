<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'patronymic' => $this->faker->firstName(),
            'date_of_birth' => $this->faker
                ->dateTimeBetween('1799-01-01 00:00:00', '1980-12-31 23:59:59')->format('Y-m-d H:i:s'),
            'date_of_death' => $this->faker
                ->dateTimeBetween('1799-01-01 00:00:00', '1980-12-31 23:59:59')->format('Y-m-d H:i:s'),
            'origin' => $this->faker->city(),
            'description' => $this->faker->paragraph
        ];
    }
}
