<?php
namespace Database\Seeders;

use App\Models\Laptop;
use Illuminate\Database\Seeder;

class LaptopSeeder extends Seeder
{
    public function run(): void
    {
        // Kiểm tra xem bảng có dữ liệu chưa để tránh lỗi duplicate entry cho cột 'name' unique
        // Tạo 20 bản ghi laptop giả
        Laptop::factory()->count(10)->create();
    }
}
