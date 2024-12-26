<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            DB::table('student')->insert([
                'name' => $faker->name, // Tên ngẫu nhiên
                'class_ID' => $faker->numberBetween(1, 9),
                'password' => Hash::make($faker->password), // Mật khẩu ngẫu nhiên
                'email' => $faker->unique()->safeEmail,
                'date' => $faker->dateTimeBetween('-34 years', '-16 years')->format('Y-m-d'),
                'created_at' => now(), // Thời gian tạo hiện tại
                'updated_at' => now(), // Thời gian cập nhật hiện tại
            ]);
        }
    }
}
