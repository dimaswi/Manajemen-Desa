<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendudukFoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_penduduk', function (Blueprint $table) {
            $table->string('foto')->after('tanggal_lahir');
            $table->string('pekerjaan')->after('foto');
            $table->string('penghasilan')->after('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_penduduk', function (Blueprint $table) {
            //
        });
    }
}
