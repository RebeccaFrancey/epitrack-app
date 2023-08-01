<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventType>
 */
class EventTypeFactory extends Factory
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
        'date'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
        'time'=>$this->faker->time($format = 'H:i:s', $max = 'now'),
        'type'=>$this->faker->word(),
        ];
    }
}
