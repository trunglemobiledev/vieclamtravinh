<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationshipNganhNgheBaiDangTuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bai_dang_tuyens', function (Blueprint $table) {
            $table->unsignedBigInteger('idNganhNghe')->nullable()->after('id');
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
            $table->dropColumn('idNganhNghe');
        });
    }
}
