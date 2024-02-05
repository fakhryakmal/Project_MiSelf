<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_konselor';
    protected $table = 'konselors';
    public $timestamps = false;
    protected $fillable=[
        'nama_konselor',
        'foto',
        'nomor_hp',
        'alamat',
        'email',
        'pendidikan_terakhir',
        'pengalaman',
        'username',
        'password',
        'status',
    ];

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
