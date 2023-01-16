<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bop_sma', function (Blueprint $table) {
            $table->id();
            $table->string('cabdin')->default('CABDIN 1');
            $table->string('kabupaten/kota');
            $table->tinyInteger('nisn');
            $table->string('nama');
            $table->string('jenjang');
            $table->string('alokasi_murni');
            $table->string('alokasi_tanpaSilpa');
            $table->string('alokasi_silpa');
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
        Schema::dropIfExists('bop_sma');
    }
};
