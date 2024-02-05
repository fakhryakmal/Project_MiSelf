<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\Konselor;


class Pelaksanaan_KonselingController extends Controller
{
    public function Index()
    {
        // Mendapatkan ID Konselor dari session (sesuaikan dengan cara Anda menyimpan ID konselor pada session)
        $idKonselor = session('id');

        $pelaksanaan = Jadwal::where('id_konselor', $idKonselor)
        ->where('status', 'ACC')
        ->get();

        foreach ($pelaksanaan as $jadwal) {
            $idKonselingJadwal = $jadwal->id_konseling;

            $konseling = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
                ->join('prodis', 'mahasiswas.prodi', '=', 'prodis.id_prodi')
                ->where('konselings.id_konseling', $idKonselingJadwal)
                ->first();

            $konselor = Konselor::find($jadwal->id_konselor);

            if ($konseling && $konselor) {
                $jadwal->id_konseling = $idKonselingJadwal;
                $jadwal->jenis_konseling = $konseling->jenis_konseling;
                $jadwal->nama_mahasiswa = $konseling->nama_mahasiswa;
                $jadwal->nama_konselor = $konselor->nama_konselor;
                $jadwal->nama_prodi = $konseling->nama_prodi;
            } else {
                $jadwal->id_konseling = 'Null';
                $jadwal->jenis_konseling = 'Null';
                $jadwal->nama_mahasiswa = 'Null';
                $jadwal->nama_konselor = 'Null';
                $jadwal->nama_prodi = 'Null';
            }
        }
        return view('Pelaksanaan_Konseling.Index', ['pelaksanaan' => $pelaksanaan]);
    }


    public function selesai(Request $request, $idJadwal, $idKonseling)
    {
        // Ubah status pada model Konseling
        $konseling = Konseling::find($idKonseling);
    
        if (!$konseling) {
            return response()->json(['success' => false, 'message' => 'Konseling tidak ditemukan']);
        }
    
        $konseling->update(['status' => 'Tunggu Hasil']);
    
        // Ubah status pada model Jadwal
        $jadwal = Jadwal::find($idJadwal);
    
        if (!$jadwal) {
            return response()->json(['success' => false, 'message' => 'Jadwal tidak ditemukan']);
        }
    
        $jadwal->update(['status' => 'Selesai']);
        return response()->json(['success' => true, 'message' => 'Status konseling dan jadwal berhasil diubah menjadi pelaksanaan']);
    }



    public function lanjut(Request $request, $idJadwal, $idKonseling)
    {
       // Ubah status pada model Konseling
       $konseling = Konseling::find($idKonseling);
    
       if (!$konseling) {
           return response()->json(['success' => false, 'message' => 'Konseling tidak ditemukan']);
       }
   
       $konseling->update(['status' => 'Konseling Lanjutan']);
   
       // Ubah status pada model Jadwal
       $jadwal = Jadwal::find($idJadwal);
   
       if (!$jadwal) {
           return response()->json(['success' => false, 'message' => 'Jadwal tidak ditemukan']);
       }
   
       $jadwal->update(['status' => 'Selesai']);
       return response()->json(['success' => true, 'message' => 'Status konseling dan jadwal berhasil diubah menjadi pelaksanaan']);
    }
}
