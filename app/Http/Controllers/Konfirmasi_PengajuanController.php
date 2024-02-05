<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Konselor;
use App\Models\Jadwal;
use App\Models\Prodi;


class Konfirmasi_PengajuanController extends Controller
{

    public function Index()
    {
        // Mengambil semua konseling yang memiliki status "Diajukan"
        $riwayat = Konseling::where('status', 'Diajukan')->get();
    
        foreach ($riwayat as $konseling) {
            $nim = $konseling->nim;
    
            $mahasiswa = Mahasiswa::join('prodis', 'mahasiswas.prodi', '=', 'prodis.id_prodi')
                ->where('mahasiswas.id', $nim)
                ->first();
    
            if ($mahasiswa) {
                $konseling->nama_mahasiswa = $mahasiswa->nama_mahasiswa;
                $konseling->nama_prodi = $mahasiswa->nama_prodi;
            } else {
                $konseling->nama_mahasiswa = 'Null';
                $konseling->nama_prodi = 'Null';
            }
        }
        return view('Konfirmasi_Pengajuan.Index', ['riwayat' => $riwayat]);
    }
    

    
    public function Konfirmasi($id)
    {
        $pengajuan = Konseling::find($id);

        if (!$pengajuan) {
            return redirect()->route('Konfirmasi_Pengajuan.Index')->with('error', 'Pengajuan tidak ditemukan');
        }

        $pengajuan->update(['status' => 'Dikonfirmasi']);

        return redirect()->route('Konfirmasi_Pengajuan.Index')->with('success', 'Pengajuan berhasil diubah');
    }
}
