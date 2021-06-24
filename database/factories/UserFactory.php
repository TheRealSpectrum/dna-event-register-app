<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\User;

final class UserFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->unique()->safeEmail(),
            "password" => bcrypt("password"),
            "remember_token" => Str::random(10),
        ];
    }
}
