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
        Schema::table('surat_cuti', function (Blueprint $table) {
            $table->unsignedBigInteger('pegawai_id')->after('id')->nullable();
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
        Schema::table('surat_cuti', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);

            $table->dropColumn('pegawai_id');
        });
    }
};
