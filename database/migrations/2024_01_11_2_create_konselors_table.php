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
        Schema::create('konselors', function (Blueprint $table) {
            $table->id('id_konselor');
            $table->string('nama_konselor');
            $table->string('foto');
            $table->string('nomor_hp');
            $table->string('alamat');
            $table->string('email');
            $table->string('pendidikan_terakhir');
            $table->string('pengalaman');
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
        Schema::dropIfExists('konselors');
    }
};
