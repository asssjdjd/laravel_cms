<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laptop>
 */
class LaptopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->numerify('Laptop Model ###'),

            // Cột 'brand' đã đổi tên thành 'title'
            'title' => fake()->randomElement(['Dell XPS', 'MacBook Pro', 'ThinkPad X1', 'Asus ROG']),

            // Các cột mới thêm
            'subTitle' => 'FEATURED , LAPTOPAugust 1, 2018',
            'content'  => fake()->text(200),   // Lưu ý: Migration bạn để string nên giới hạn 255 ký tự.

            // Ảnh giả lập
            'image' => fake()->imageUrl(640, 480, 'technics', true),
        ];
    }
}
