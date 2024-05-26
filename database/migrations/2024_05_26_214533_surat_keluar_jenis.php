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
        Schema::table('surat_keluar', function (Blueprint $table) {
            $table->unsignedBigInteger('jenis_id')->after('id')->nullable();
            $table->foreign('jenis_id')->references('id')->on('jenis_surat')->onDelete('cascade');
            $table->dropColumn('JENIS_SURAT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_keluar', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);

            $table->dropColumn('pegawai_id');
        });
    }
};
