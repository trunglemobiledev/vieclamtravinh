<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NganhNgheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++){
        	\App\Models\NganhNghe::create([
                'nganhNghe' => $faker->name,
                'moTa' => $faker->name
			]);
		}
    }
}
