<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Event;

final class EventFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Event::class;

    public function definition(): array
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
