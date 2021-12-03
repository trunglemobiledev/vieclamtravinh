<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationshipHuyenPhuongXa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phuong_xas', function (Blueprint $table) {
            $table->unsignedBigInteger('idHuyen')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phuong_xas', function (Blueprint $table) {
            $table->dropColumn('idHuyen');
        });
    }
}
