<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahanPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_penduduk', function (Blueprint $table) {
            $table->date('tanggal_lahir')->after('nomor_keluarga');
            $table->string('alamat')->after('nomor_keluarga');
            $table->string('agama')->after('nomor_keluarga');
            $table->string('tempat_lahir')->after('nomor_keluarga');
            $table->string('jenis_kelamin')->after('nomor_keluarga');
            $table->string('status_perkawinan')->after('nomor_keluarga');
            $table->string('status')->after('nomor_keluarga');
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
