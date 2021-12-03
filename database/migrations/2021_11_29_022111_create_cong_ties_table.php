<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongTiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cong_ties', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("tenCongTy", 191);
            $table->string("diaChi", 191);
            $table->string("gioiThieu", 191);
            $table->string("Logo", 191)->nullable();
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
        Schema::dropIfExists('cong_ties');
    }
}
