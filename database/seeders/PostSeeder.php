<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $post_types = \App\Models\PostType::all()->pluck('id')->toArray();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++){
        	\App\Models\Post::create([
                'title' => $faker->name,
                'content' => $faker->name,
                'bodt' => $faker->name,
                'post_type_id' => $faker->randomElement($post_types),
                //{{SEEDER_NOT_DELETE_THIS_LINE}}
			]);
		}
    }
}
