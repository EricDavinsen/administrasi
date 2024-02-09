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
        Schema::create('data_bpjs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->string('NOMOR_JKN');
            $table->string('NIK');
            $table->string('NIP')->nullable();
            $table->string('NAMA_LENGKAP');
            $table->string('JENIS_KELAMIN');
            $table->string('STATUS_KAWIN');
            $table->string('HUBUNGAN_KELUARGA');
            $table->date('TANGGAL_LAHIR');
            $table->date('TANGGAL_MULAI_TMT')->nullable();
            $table->date('TANGGAL_SELESAI_TMT')->nullable();
            $table->string('GAJI_POKOK')->nullable();
            $table->string('NAMA_FASKES')->nullable();
            $table->string('NO_TELEPON')->nullable();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
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
        Schema::dropIfExists('data_bpjs');
    }
};
