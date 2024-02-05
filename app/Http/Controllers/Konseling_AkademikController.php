<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\Konselor;


class Konseling_AkademikController extends Controller
{

    public function Data_Pengajuan(Request $request)
    {
        $Prodi = $request->session()->get('id_prodi');

        $akademik = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
        ->select('konselings.*', 'mahasiswas.nama_mahasiswa')
        ->where('konselings.status', '!=', 'Selesai')
        ->where('mahasiswas.prodi', $Prodi)
        ->where('konselings.jenis_konseling', 'Akademik')
        ->get();
    
        return view('Konseling_Akademik.Data_Pengajuan', ['akademik' => $akademik]);
    }
    

    public function index(Request $request)
    {
        $Prodi = $request->session()->get('id_prodi');

        $ajukans = Mahasiswa::where('prodi', $Prodi)->get();
        return view('Konseling_Akademik.index', ['ajukans' => $ajukans]);
    }


    public function ajukanKonseling(Request $request)
    {
        try {
            $dataMahasiswa = $request->get('mahasiswaList');

            foreach ($dataMahasiswa as $mahasiswa) {
                Konseling::create([
                    'nim' => $mahasiswa['id'],
                    'alasan_pengajuan' => $mahasiswa['alasan'],
                    'jenis_konseling' => 'Akademik',
                    'tanggal_pengajuan' => now(),
                    'status' => 'Diajukan'
                ]);
            }

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
