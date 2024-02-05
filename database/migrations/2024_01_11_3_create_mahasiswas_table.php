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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('id');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->foreignId('prodi')->constrained('prodis', 'id_prodi'); 
            $table->string('alamat');
            $table->string('nomor_hp');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('status');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};
