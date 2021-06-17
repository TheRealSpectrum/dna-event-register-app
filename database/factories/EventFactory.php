<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->words(3, true),
            "organizer" => $this->faker->name(),
            "date" => $this->faker->dateTimeBetween("+1 day", "+20 days"),
            "location" => $this->faker->words(2, true),
            "description" => $this->faker->paragraph(20),
            "max_registration_num" => $this->faker->numberBetween(1, 12) * 5,
        ];
    }
}
