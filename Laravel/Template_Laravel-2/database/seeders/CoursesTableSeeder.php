<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Courses;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Courses::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'difficulty' => $faker->randomElement(['beginner', 'intermediate', 'advanced']),
                'price' => $faker->randomFloat(2, 10, 1000),
                'start_date' => $faker->dateTimeBetween('now', '+1 year'),
                'image' => 'product' . $index . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
