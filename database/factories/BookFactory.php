<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->regexify('^[A-Z][a-z]{1,126}$'),
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->numerify('###-#-###-#####-#'),
            'genre_id' => Genre::get()->random()->id,
            'author_id' => Author::get()->random()->id,
            'date_of_writing' => $this->faker
                ->dateTimeBetween('1855-01-01 00:00:00', '2023-12-31 23:59:59')->format('Y-m-d H:i:s'),
            'date_of_publication' => $this->faker
                ->dateTimeBetween('1855-01-01 00:00:00', '2023-12-31 23:59:59')->format('Y-m-d H:i:s'),
        ];
    }
}
