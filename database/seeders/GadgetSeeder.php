<?php

namespace Database\Seeders;

use App\Models\Gadget;
use Illuminate\Database\Seeder;

class GadgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 10 bản ghi mẫu 
        Gadget::factory()->count(10)->create();
    }
}
