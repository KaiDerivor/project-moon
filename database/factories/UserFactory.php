<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function numberAims($max=6)
    {
        $arr = [];
        $maxSize = random_int(1, $max);
        for ($i = 0; $i < $maxSize; $i++) {
            $arr[]=[fake()->unixTime() => fake()->sentence(rand(1, 6), true)];
        }
        return $arr;
    }
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'main' =>$this->numberAims(1),
            'month' => $this->numberAims(),
            'week' => $this->numberAims(),
            'day' => $this->numberAims(),
            'statistic-month' => fake()->numberBetween(0, 100),
            'statistic-week' => fake()->numberBetween(0, 100),
            'statistic-day' => fake()->numberBetween(0, 100),
            'current_timezone' => fake()->numberBetween(0, 12),
            'password' => '$2y$10$E6n36Rz9WIUH9SoZwmDVSOICeF3gYkUXYm85UU3x1W0c42Ya//dSK', // 111
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
