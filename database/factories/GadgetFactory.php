<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gadget>
 */
class GadgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Smart Watch', 'Air Pod Pro', 'Camera 4K', 'Drone DJI', 'VR Headset']),
            'subTitle' => fake()->randomElement(['Latest Tech', 'Innovative Design', 'Premium Quality']),
            'content'  => fake()->text(200),
            'image' => fake()->randomElement([
                'gadgets/1770232468_anh1.jpg',
                'gadgets/1770232469_anh2.jpg',
                'gadgets/1770232470_anh3.jpg',
            ]),
            'brand' => fake()->randomElement(['Samsung', 'Apple', 'Sony', 'DJI', 'Meta']),
        ];
    }
}
