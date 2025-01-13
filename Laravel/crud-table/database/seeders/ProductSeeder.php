<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $storeIds = DB::table('stores')->pluck('id')->toArray();

        // Đảm bảo mỗi cửa hàng có ít nhất 2 sản phẩm
        foreach ($storeIds as $storeId) {
            for ($j = 0; $j < 2; $j++) {
                DB::table('products')->insert([
                    'store_id' => $storeId,
                    'name' => ucfirst($faker->word),
                    'description' => $faker->sentence,
                    'price' => $faker->randomFloat(2, 10, 500),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        // Sau đó, tạo thêm 10 sản phẩm ngẫu nhiên cho các cửa hàng
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'store_id' => $faker->numberBetween(1, 5),
                'name' => ucfirst($faker->word),
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 500),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
