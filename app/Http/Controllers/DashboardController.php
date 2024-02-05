<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;

class DashboardController extends Controller
{
    public function getJumlahKonselingAkademik()
    {
        $jumlahKonselingAkademik = Konseling::where('jenis_konseling', 'Akademik')->count();
        return $jumlahKonselingAkademik;
    }

    public function getJumlahKonselingNonAkademik()
    {
        $jumlahKonselingNonAkademik = Konseling::where('jenis_konseling', 'Non Akademik')->count();
        return $jumlahKonselingNonAkademik;
    }

    public function Diajukan()
    {
        $diajukan = Konseling::where('status', 'Diajukan')->count();
        return $diajukan;
    }

    public function Dikonfirmasi()
    {
        $dikonfirmasi = Konseling::where('status', 'Dikonfirmasi')->count();
        return $dikonfirmasi;
    }

    public function Terjadwal()
    {
        $terjadwal = Konseling::where('status', 'Terjadwal')->count();
        return $terjadwal;
    }

    public function Pelaksanaan()
    {
        $pelaksanaan = Konseling::where('status', 'Pelaksanaan')->count();
        return $pelaksanaan;
    }

    public function TungguHasil()
    {
        $tungguhasil = Konseling::where('status', 'Tunggu Hasil')->count();
        return $tungguhasil;
    }

    public function Selesai()
    {
        $selesai = Konseling::where('status', 'Selesai')->count();
        return $selesai;
    }


    public function index_DKA()
    {
        $jumlahKonselingAkademik = $this->getJumlahKonselingAkademik();
        $jumlahKonselingNonAkademik = $this->getJumlahKonselingNonAkademik();
        $diajukan = $this-> Diajukan();
        $dikonfirmasi = $this-> Dikonfirmasi();
        $terjadwal = $this-> Terjadwal();
        $pelaksanaan = $this-> Pelaksanaan();
        $tungguhasil = $this-> TungguHasil();
        $selesai = $this-> Selesai();
    
        return view('Dashboard.DKA', compact('jumlahKonselingAkademik', 'jumlahKonselingNonAkademik', 'diajukan', 'dikonfirmasi',
                    'terjadwal', 'pelaksanaan', 'tungguhasil', 'selesai'));
    }
    




    public function getJumlahKonselingAkademikmhs()
    {
        $nimMahasiswa = session('nim');

        $jumlahKonselingAkademikmhs = Konseling::where('jenis_konseling', 'Akademik')
            ->where('nim', $nimMahasiswa)
            ->count();

        return $jumlahKonselingAkademikmhs;
    }

    public function getJumlahKonselingNonAkademikmhs()
    {
        $nimMahasiswa = session('nim');
        
        $jumlahKonselingNonAkademikmhs = Konseling::where('jenis_konseling', 'Non Akademik')
            ->where('nim', $nimMahasiswa)
            ->count();

        return $jumlahKonselingNonAkademikmhs;
    }

    public function index_Mahasiswa()
    {
        $jumlahKonselingAkademikmhs = $this->getJumlahKonselingAkademikmhs();
        $jumlahKonselingNonAkademikmhs = $this->getJumlahKonselingNonAkademikmhs();
    
        return view('Dashboard.Mahasiswa', compact('jumlahKonselingAkademikmhs', 'jumlahKonselingNonAkademikmhs'));
    }





    public function getJumlahKonselingAkademikksl()
    {
        $idKonselor = session('id');
        $jumlahKonselingAkademikksl = Konseling::join('jadwals', 'konselings.id_konseling', '=', 'jadwals.id_konseling')
            ->where('konselings.jenis_konseling', 'Akademik')
            ->where('jadwals.id_konselor', $idKonselor)
            ->count();
    
        return $jumlahKonselingAkademikksl;
    }
    

    public function getJumlahKonselingNonAkademikksl()
    {
        $idKonselor = session('id_konselor');
        $jumlahKonselingNonAkademikksl = Konseling::join('jadwals', 'konselings.id_konseling', '=', 'jadwals.id_konseling')
            ->where('konselings.jenis_konseling', 'Non Akademik')
            ->where('jadwals.id_konselor', $idKonselor)
            ->count();
        return $jumlahKonselingNonAkademikksl;
    }

    public function index_Konselor()
    {
        $jumlahKonselingAkademikksl = $this->getJumlahKonselingAkademikksl();
        $jumlahKonselingNonAkademikksl = $this->getJumlahKonselingNonAkademikksl();
    
        return view('Dashboard.Konselor', compact('jumlahKonselingAkademikksl', 'jumlahKonselingNonAkademikksl'));
    }


    public function Diajukanprd()
    {
        $idProdi = session('id_prodi');
    
        $diajukanprd = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
            ->where('konselings.status', 'Diajukan')
            ->where('konselings.jenis_konseling', 'Akademik')
            ->where('mahasiswas.prodi', $idProdi)
            ->count();
    
        return $diajukanprd;
    }
    
    public function Dikonfirmasiprd()
    {
        $idProdi = session('id_prodi');
    
        $dikonfirmasiprd = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
            ->where('konselings.status', 'Dikonfirmasi')
            ->where('konselings.jenis_konseling', 'Akademik')
            ->where('mahasiswas.prodi', $idProdi)
            ->count();
    
        return $dikonfirmasiprd;
    }
    
    public function Terjadwalprd()
    {
        $idProdi = session('id_prodi');
    
        $terjadwalprd = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
            ->where('konselings.status', 'Terjadwal')
            ->where('konselings.jenis_konseling', 'Akademik')
            ->where('mahasiswas.prodi', $idProdi)
            ->count();
    
        return $terjadwalprd;
    }
    
    public function Pelaksanaanprd()
    {
        $idProdi = session('id_prodi');
    
        $pelaksanaanprd = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
            ->where('konselings.status', 'Pelaksanaan')
            ->where('konselings.jenis_konseling', 'Akademik')
            ->where('mahasiswas.prodi', $idProdi)
            ->count();
    
        return $pelaksanaanprd;
    }
    
    public function TungguHasilprd()
    {
        $idProdi = session('id_prodi');
    
        $tungguhasilprd = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
            ->where('konselings.status', 'Tunggu Hasil')
            ->where('konselings.jenis_konseling', 'Akademik')
            ->where('mahasiswas.prodi', $idProdi)
            ->count();
    
        return $tungguhasilprd;
    }
    
    public function Selesaiprd()
    {
        $idProdi = session('id_prodi');
    
        $selesaiprd = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
            ->where('konselings.status', 'Selesai')
            ->where('konselings.jenis_konseling', 'Akademik')
            ->where('mahasiswas.prodi', $idProdi)
            ->count();
    
        return $selesaiprd;
    }
    

    public function index_Prodi()
    {
        $diajukanprd = $this-> Diajukanprd();
        $dikonfirmasiprd = $this-> Dikonfirmasiprd();
        $terjadwalprd = $this-> Terjadwalprd();
        $pelaksanaanprd = $this-> Pelaksanaanprd();
        $tungguhasilprd = $this-> TungguHasilprd();
        $selesaiprd = $this-> Selesaiprd();
    
        return view('Dashboard.Prodi', compact('diajukanprd', 'dikonfirmasiprd', 'terjadwalprd', 'pelaksanaanprd', 'tungguhasilprd', 'selesaiprd'));
    }

}
