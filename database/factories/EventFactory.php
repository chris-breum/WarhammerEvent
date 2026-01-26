<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        $startTime = $this->faker->time('H:i:s');
        $endTime = $this->faker->time('H:i:s');
        
        return [
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraphs(4, true),
            'category' => $this->faker->randomElement([
                'Musik',
                'Natur',
                'andet',
                'sport',
                'foredrag'
            ]),
            'date' => $this->faker->date(),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
