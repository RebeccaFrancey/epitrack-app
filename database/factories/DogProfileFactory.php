<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DogProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'user_id'=>6,
        'name'=>$this->faker->firstName($gender='male'|'female'),
        'age'=>$this->faker->randomDigitNotNull(),
        'sex'=>$this->faker->boolean(),
        'weight'=>$this->faker->numberBetween(3,90),
        'breed'=>$this->faker->word(),
        'epilepsy_type'=>$this->faker->word(),
        'medication'=>$this->faker->sentence($nbWords=5),
        'reminder'=>$this->faker->boolean(),
        'other'=>$this->faker->text($maxNbChars=50),
        ];
    }
}
