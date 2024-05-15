<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $albumIDs = Album::pluck('id')->toArray();;

        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'album_id' => $albumIDs[array_rand($albumIDs)]
        ];
    }
}
