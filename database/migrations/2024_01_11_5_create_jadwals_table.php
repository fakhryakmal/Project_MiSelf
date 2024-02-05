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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->foreignId('id_konseling')->constrained('konselings', 'id_konseling'); 
            $table->foreignId('id_konselor')->constrained('konselors', 'id_konselor');
            $table->date('tanggal_konseling');
            $table->time('waktu_konseling');
            $table->string('tempat_konseling');
            $table->string('catatan_konseling');
            $table->string('alasan_reschedule');
            $table->integer('konseling_ke');
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
        Schema::dropIfExists('jadwals');
    }
};
