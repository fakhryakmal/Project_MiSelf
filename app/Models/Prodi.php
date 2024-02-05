<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_prodi';
    protected $table = 'prodis';
    public $timestamps = false;
    protected $fillable=[
        'nama_prodi',
        'nama_sekprod',
        'nomor_hp',
        'email',
        'username',
        'password',
        'status',
    ];

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }
}
