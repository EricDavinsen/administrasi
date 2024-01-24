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
        Schema::create('surat_cutis', function (Blueprint $table) {
            $table->id();
            $table->string('NO_CUTI');
            $table->string('NAMA');
            $table->string('JENIS_CUTI');
            $table->string('ALASAN_CUTI');
            $table->date('TANGGAL_MULAI');
            $table->date('TANGGAL_SELESAI');
            $table->integer('LAMA_CUTI');
            $table->integer('SISA_CUTI_TAHUNAN');
            $table->string('FILE_SURAT');
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
        Schema::dropIfExists('surat_cutis');
    }
};
