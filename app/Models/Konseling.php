<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_konseling';
    protected $table = 'konselings';
    public $timestamps = false;
    protected $fillable=[
        'nim',
        'jenis_konseling',
        'tanggal_pengajuan',
        'tanggal_konfirmasi',
        'tanggal_selesai',
        'alasan_pengajuan',
        'hasil_akhir',
        'feedback',
        'status',
    ];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
