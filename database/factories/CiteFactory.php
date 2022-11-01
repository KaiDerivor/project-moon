<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cite>
 */
class CiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'eng'=>$this->faker->sentence(random_int(1,6),true),
            'ua'=>$this->faker->sentence(random_int(1,6),true),
            'pl'=>$this->faker->sentence(random_int(1,6),true),
            'ru'=>$this->faker->sentence(random_int(1,6),true),
        ];
    }
}
