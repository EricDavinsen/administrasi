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
        Schema::table('spt_pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('surat_perintah_tugas_id')->nullable();
            $table->unsignedBigInteger('pegawai_id')->after('surat_perintah_tugas_id')->nullable();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->foreign('surat_perintah_tugas_id')->references('id')->on('surat_perintah_tugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spt_pegawai', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);

            $table->dropColumn('pegawai_id');
        });
    }
};