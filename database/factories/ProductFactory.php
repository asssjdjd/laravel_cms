<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = fake()->randomElement(['laptop', 'phone', 'gadget']);
        
        return [
            'user_id' => 1,
            'category' => $category,
            'name' => fake()->unique()->numerify('Product ###'),
            'title' => fake()->randomElement(['Dell XPS', 'MacBook Pro', 'ThinkPad X1', 'Asus ROG', 'iPhone 15', 'Samsung S24', 'Smart Watch', 'Air Pod Pro']),
            'subTitle' => fake()->randomElement(['FEATURED', 'Latest Tech', 'Innovative Design', 'Premium Quality']),
            'content' => fake()->text(200),
            'image' => 'laptops/1770232468_anh1.jpg',
            'brand' => fake()->randomElement(['Dell', 'Apple', 'ThinkPad', 'Asus', 'Samsung', 'Sony', 'DJI']),
            'time' => fake()->dateTime(),
        ];
    }
}
