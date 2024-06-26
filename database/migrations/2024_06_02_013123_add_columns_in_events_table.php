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
        Schema::table('events', function (Blueprint $table) {
            $table->string('start_time')->after('title')->nullable();
            $table->string('end_time')->after('start_time')->nullable();
            $table->string('location')->after('end_time')->nullable();
            $table->string('disposition')->after('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
            $table->dropColumn('location');
            $table->dropColumn('disposition');
        });
    }
};
