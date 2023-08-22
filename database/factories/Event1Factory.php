<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventSeizure>
 */
class Event1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id'=>1,
        'duration'=>$this->faker->randomDigitNotNull(),
        'awake_asleep'=>$this->faker->boolean(),
        'severity'=>$this->faker->word(),
        'emergency_med'=>$this->faker->boolean(),
        'body'=>$this->faker->boolean(),
        'movement'=>$this->faker->boolean(),
        'mouth'=>$this->faker->boolean(),
        'bladder'=>$this->faker->boolean(),
        'vomit'=>$this->faker->boolean(),
        'responsive'=>$this->faker->boolean(),
        'chewing'=>$this->faker->boolean(),
        'description'=>$this->faker->text($maxNbChars = 200),
        'type_id'=>1,
        ];
    }
}
