<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phone>
 */
class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => '1',
            'title' => fake()->randomElement(['Dell XPS', 'MacBook Pro', 'ThinkPad X1', 'Asus ROG']),
            'subTitle' => 'FEATURED , LAPTOPAugust 1, 2018',
            'content' => fake()->text(200),
            'time' => 'August 1, 2018',
            'image' => 'laptops/1770232468_anh1.jpg',
        ];
    }
}
