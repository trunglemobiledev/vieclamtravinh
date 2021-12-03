<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoaiCongViecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++){
        	\App\Models\LoaiCongViec::create([
                'tenLoai' => $faker->name,
                'ghiChu' => $faker->name
			]);
		}
    }
}
