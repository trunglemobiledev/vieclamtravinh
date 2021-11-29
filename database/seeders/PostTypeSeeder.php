<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class PostTypeSeeder extends Seeder
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
        	\App\Models\PostType::create([
                'name' => $faker->name,
                'note' => $faker->name
                //{{SEEDER_NOT_DELETE_THIS_LINE}}
			]);
		}
    }
}
