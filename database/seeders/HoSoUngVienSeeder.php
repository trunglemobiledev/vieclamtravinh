<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HoSoUngVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $users = \App\Models\User::all()->pluck('id')->toArray();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++){
        	\App\Models\HoSoUngVien::create([
                'hoTen' => $faker->name,
                'namSinh' => $faker->numberBetween(1980, 2004),
                'diaChi' => $faker->company,
                'moTaBanThan' => $faker->name,
                'sdt' => $faker->phoneNumber,
                'created_by'=> $faker->randomElement($users),
                'updated_by'=> $faker->randomElement($users),
			]);
		}
    }
}
