<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationshipLoaiCongViecBaiDangTuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bai_dang_tuyens', function (Blueprint $table) {
            $table->unsignedBigInteger('idLoaiCongViec')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bai_dang_tuyens', function (Blueprint $table) {
            $table->dropColumn('idLoaiCongViec');
        });
    }
}
