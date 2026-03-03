<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 10 bản ghi mẫu 
        Phone::factory()->count(10)->create();
    }
}
