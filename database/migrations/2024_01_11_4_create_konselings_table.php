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
        Schema::create('konselings', function (Blueprint $table) {
            $table->id('id_konseling');
            $table->foreignId('nim')->constrained('mahasiswas', 'id'); 
            $table->string('jenis_konseling');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_konfirmasi');
            $table->date('tanggal_selesai');
            $table->string('alasan_pengajuan');
            $table->string('hasil_akhir');
            $table->string('feedback');
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
        Schema::dropIfExists('konselings');
    }
};
