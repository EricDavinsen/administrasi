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
        Schema::table('surat_masuk', function (Blueprint $table) {
            $table->unsignedBigInteger('sifat_id')->after('id')->nullable();
            $table->foreign('sifat_id')->references('id')->on('sifat_surat')->onDelete('cascade');
            $table->dropColumn('SIFAT_SURAT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_masuk', function (Blueprint $table) {
            $table->dropForeign(['pegawai_id']);

            $table->dropColumn('pegawai_id');
        });
    }
};
