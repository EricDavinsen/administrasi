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
        Schema::create('surat_perintah_tugas', function (Blueprint $table) {
            $table->id("id");
            $table->string('NO_SPT');
            $table->date('TANGGAL_SPT');
            $table->string('NAMA');
            $table->date('TANGGAL_MULAI');
            $table->date('TANGGAL_SELESAI');
            $table->integer('LAMA_TUGAS');
            $table->string('KEPERLUAN');
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
        Schema::dropIfExists('surat_perintah_tugas');
    }
};
