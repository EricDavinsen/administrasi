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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('surat_masuk_id');
            $table->string('NAMA');
            $table->string('PENERUS');
            $table->string('INSTRUKSI');
            $table->string('INFORMASI_LAINNYA');
            $table->string('HASIL_LAPORAN')->nullable();
            $table->foreign('surat_masuk_id')->references('id')->on('surat_masuk')->onDelete('cascade');
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
        Schema::dropIfExists('disposisis');
    }
};
