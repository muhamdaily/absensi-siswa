<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('judul');
            $table->string('username');
            $table->string('role');
            $table->string('mapel');
            $table->datetime('waktu');
            $table->text('deskripsi');
        });

        $trigger = <<<EOT
CREATE TRIGGER create_notifikasi AFTER INSERT ON absensi
FOR EACH ROW
BEGIN
    DECLARE _nama VARCHAR(255);

    SELECT nama INTO _nama FROM siswa WHERE id = NEW.id_siswa;

    IF NEW.keterangan = 'Sakit' THEN
        INSERT INTO notifikasi (nama, judul, username, role, mapel, waktu, deskripsi)
        VALUES (_nama, CONCAT(_nama, ' telah izin karena ', NEW.keterangan), NEW.username, CONCAT('Guru - ', NEW.mapel), NEW.mapel, NEW.waktu, CONCAT('Kepada wali murid dari ', _nama, '. Ananda telah izin karena ', NEW.keterangan));
    ELSEIF NEW.keterangan = 'Izin' THEN
        INSERT INTO notifikasi (nama, judul, username, role, mapel, waktu, deskripsi)
        VALUES (_nama, CONCAT(_nama, ' ', NEW.keterangan), NEW.username, CONCAT('Guru - ', NEW.mapel), NEW.mapel, NEW.waktu, CONCAT('Kepada wali murid dari ', _nama, '. Ananda ', NEW.keterangan));
    ELSE
        INSERT INTO notifikasi (nama, judul, username, role, mapel, waktu, deskripsi)
        VALUES (_nama, CONCAT(_nama, ' telah ', NEW.keterangan), NEW.username, CONCAT('Guru - ', NEW.mapel), NEW.mapel, NEW.waktu, CONCAT('Kepada wali murid dari ', _nama, '. Ananda telah ', NEW.keterangan));
    END IF;
END
EOT;

        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifikasi');
        DB::unprepared('DROP TRIGGER IF EXISTS create_notifikasi');
    }
};
