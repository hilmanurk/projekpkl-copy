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
        Schema::create('realisasi', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('nisn');
            $table->string('nama');
            $table->integer('tahun');
            $table->float('pagu_anggaran');
            $table->float('rencana_tw1');
            $table->float('realisasi_tw1');
            $table->float('rencana_tw2');
            $table->float('realisasi_tw2');
            $table->float('rencana_tw3');
            $table->float('realisasi_tw3');
            $table->float('rencana_tw4');
            $table->float('realisasi_tw4');
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
        Schema::dropIfExists('realisasi');
    }
};
