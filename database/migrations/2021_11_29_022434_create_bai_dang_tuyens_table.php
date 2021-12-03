<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiDangTuyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_dang_tuyens', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("tieuDe");
            $table->string("tenHoKinhDoanh", 191)->nullable();
            $table->string("noidung");
            $table->string("hinhAnh", 191)->nullable();
            $table->string("diaChi", 191)->nullable();
            $table->string("hinhThucTraLuong", 191)->nullable();
            $table->string("gioiTinh", 191)->nullable();
            $table->integer("soLuongTuyen")->nullable();
            $table->integer("minTuoi")->nullable();
            $table->integer("maxTuoi")->nullable();
            $table->string("quyenLoi", 191)->nullable();
            $table->string("kinhNghiem", 191)->nullable();
            $table->float("minLuong")->nullable();
            $table->float("maxLuong")->nullable();
            $table->string("kiNang", 191)->nullable();
            $table->integer("danhGiaPhanHoi")->nullable();
            $table->boolean("hide", 191)->nullable()->default("1");
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bai_dang_tuyens');
    }
}
