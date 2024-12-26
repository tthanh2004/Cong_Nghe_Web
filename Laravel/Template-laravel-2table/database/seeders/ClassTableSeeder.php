<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Danh sách các lớp học
        $classes = ['10A1', '11A1', '12A1', '10A2', '11A2', '12A2', '10A3', '11A3', '12A3'];

        foreach ($classes as $class) {
            DB::table('classes')->insert([
                'nameClass' => $class,
                'quanlity' => $faker->numberBetween(20, 50), // Số lượng học sinh ngẫu nhiên từ 20 đến 50
                'created_at' => now(), // Thời gian tạo hiện tại
                'updated_at' => now(), // Thời gian cập nhật hiện tại
            ]);
        }
    }
}
