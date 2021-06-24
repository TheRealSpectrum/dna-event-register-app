<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\{Event, Registration};

final class RegistrationFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Registration::class;

    public function definition(): array
    {
        return [
            "event_id" => Event::factory(),
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "note" => $this->faker->paragraph(2),
        ];
    }

    public function oneEvent(?Event $optionalEvent = null): static
    {
        $event = $optionalEvent ?? Event::factory()->create();
        return $this->state(function (array $attributes) use ($event) {
            return [
                "event_id" => $event->id,
            ];
        });
    }
}
