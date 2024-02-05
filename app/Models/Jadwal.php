<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jadwal';
    protected $table = 'jadwals';
    public $timestamps = false;
    protected $fillable=[
        'id_konseling',
        'id_konselor',
        'tanggal_konseling',
        'waktu_konseling',
        'tempat_konseling',
        'catatan_konseling',
        'alasan_reschedule',
        'konseling_ke',
        'status',
    ];

    public function konseling(){
        return $this->belongsTo(Konseling::class);
    }

    public function konselor(){
        return $this->belongsTo(Konselor::class);
    }
}
