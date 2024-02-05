<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'mahasiswas';
    public $timestamps = false;
    protected $fillable=[
        'nim',
        'nama_mahasiswa',
        'prodi',
        'alamat',
        'nomor_hp',
        'email',
        'username',
        'password',
        'status',
    ];

    public function prodi(){
        return $this->belongsTo(Prodi::class);
    }

    public function konseling(){
        return $this->hasMany(Konseling::class);
    }
}
