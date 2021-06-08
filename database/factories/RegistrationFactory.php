<?php

namespace Database\Factories;

use App\Models\{Registration, Event};
use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "event_id" => Event::factory(),
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "note" => $this->faker->paragraph(2),
        ];
    }

    public function oneEvent(?Event $optionalEvent = null)
    {
        $event = $optionalEvent ?? Event::factory()->create();
        return $this->state(function (array $attributes) use ($event) {
            return [
                "event_id" => $event->id,
            ];
        });
    }
}
