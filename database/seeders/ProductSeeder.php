<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample products for each category
        Product::factory(10)->create(['category' => 'laptop']);
        Product::factory(10)->create(['category' => 'phone']);
        Product::factory(10)->create(['category' => 'gadget']);
    }
}
