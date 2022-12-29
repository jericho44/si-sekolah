<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->string('name', 50)->nullable();
            $table->string('npsn', 50)->nullable();
            $table->string('alamat', 50)->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->enum('status', ['negeri', 'swasta']);
            $table->string('jenjang_pendidikan', 5)->nullable();
            $table->enum('akreditasi', ['a', 'b', 'c', 'd']);
            $table->string('kepala_sekolah', 50)->nullable();
            $table->date('tanggal_berdiri')->nullable();
            $table->string('foto');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('desa_id')->references('id')->on('desa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
}
