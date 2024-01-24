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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('NAMA_PEGAWAI');
            $table->string('NIK');
            $table->date('TANGGAL_LAHIR');
            $table->string('JENIS_KELAMIN');
            $table->string('AGAMA');
            $table->string('INSTANSI');
            $table->string('UNIT');
            $table->string('SUB_UNIT');
            $table->string('JABATAN');
            $table->string('JENIS_PEGAWAI');
            $table->string('PENDIDIKAN_TERAKHIR');
            $table->string('STATUS_PEGAWAI');
            $table->string('KEDUDUKAN');
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
        Schema::dropIfExists('pegawais');
    }
};
