<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoSoUngViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ho_so_ung_viens', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("hoTen", 191);
            $table->integer("namSinh");
            $table->string("diaChi", 191);
            $table->string("moTaBanThan", 191);
            $table->string("sdt", 191);
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
        Schema::dropIfExists('ho_so_ung_viens');
    }
}
