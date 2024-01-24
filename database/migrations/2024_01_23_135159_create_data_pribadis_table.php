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
        Schema::create('data_pribadi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id');
            $table->string('NO_KTP');
            $table->string('NO_BPJS');
            $table->string('NO_NPWP');
            $table->integer('TINGGI_BADAN');
            $table->integer('BERAT_BADAN');
            $table->string('WARNA_KULIT');
            $table->string('GOLONGAN_DARAH');
            $table->string('ALAMAT_RUMAH');
            $table->string('KODE_POS');
            $table->string('TELPON_RUMAH');
            $table->string('NO_HP');
            $table->string('EMAIL');
            $table->timestamps();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pribadis');
    }
};
