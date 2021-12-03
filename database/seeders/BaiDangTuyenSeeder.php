<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BaiDangTuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $nganh_nghe = \App\Models\NganhNghe::all()->pluck('id')->toArray();
        $loai_cong_viec = \App\Models\LoaiCongViec::all()->pluck('id')->toArray();
        $users = \App\Models\User::all()->pluck('id')->toArray();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++){
        	\App\Models\BaiDangTuyen::create([
                'tieuDe'=> $faker->name,
                'tenHoKinhDoanh'=> $faker->name,
                'noidung'=> $faker->name,
                'hinhAnh'=> $faker->name,
                'diaChi'=> $faker->name,
                'hinhThucTraLuong'=> $faker->name,
                'gioiTinh'=> $faker->name,
                'soLuongTuyen'=> $faker->numberBetween(10, 10),
                'minTuoi'=> $faker->numberBetween(20, 50),
                'maxTuoi'=> $faker->numberBetween(22, 50),
                'quyenLoi'=> $faker->name,
                'kinhNghiem'=> $faker->name,
                'minLuong'=> $faker->numberBetween(50, 100),
                'maxLuong'=> $faker->numberBetween(50, 100),
                'kiNang'=> $faker->name,
                'danhGiaPhanHoi'=> $faker->numberBetween(0, 5),
                'created_by'=> $faker->randomElement($users),
                'updated_by'=> $faker->randomElement($users),
                'hide'=>  $faker->numberBetween(0, 1),
                'idNganhNghe' => $faker->randomElement($nganh_nghe),
                'idLoaiCongViec' => $faker->randomElement($loai_cong_viec),
			]);
		}
    }
}
