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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id("id");
            $table->string('NOMOR_SURAT');
            $table->date('TANGGAL_SURAT');
            $table->string('JENIS_SURAT');
            $table->string('TUJUAN_SURAT');
            $table->string('SIFAT_SURAT');
            $table->string('PERIHAL_SURAT');
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
        Schema::dropIfExists('surat_keluars');
    }
};
