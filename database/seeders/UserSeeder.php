<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'name'=>'Lee Steven',
                'email'=>'admin@vltv.com',
                'password'=>bcrypt('123456')
            ]
        ];
        DB::table('users')->insert($data);
    }
}
