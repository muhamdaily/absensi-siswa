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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('mapel');
            $table->timestamp('waktu');
            $table->integer('id_siswa');
            $table->enum('keterangan', ['Sakit', 'Ijin', 'Alpha', 'Terlambat', 'Masuk', 'Pulang'])->default('Masuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
