<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'price' => $faker->randomFloat(2, 10, 1000),
                'image' => 'product' . $index . '.jpg',
            ]);
        }
    }
}
