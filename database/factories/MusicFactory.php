<?php

namespace Database\Factories;

use App\Models\Music;
use Illuminate\Database\Eloquent\Factories\Factory;

class MusicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Music::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'songname'          =>$this->faker->word,
            'artist'            =>$this->faker->word,
            'gender'            =>$this->faker->word,
            'yearlaunch'        =>$this->faker->year($max = 'now'),
            'album'             =>$this->faker->word,
            'socialmedia'       =>$this->faker->word,
            'timelistening'     =>$this->faker->randomDigitNot(0),
            'letter'            =>$this->faker->text($maxNbChars = 20),
            'comment'           =>$this->faker->text($maxNbChars = 20),
        ];
    }
}
