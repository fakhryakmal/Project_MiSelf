<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Konselor;
use App\Models\Jadwal;
use App\Models\Prodi;


class Riwayat_KonselingController extends Controller
{

    public function RiwayatStaffDKA()
    {
        // Mengambil konseling yang memiliki status "Selesai"
        $riwayat = Konseling::where('status', 'Selesai')->get();
    
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
    
        return view('Riwayat_Konseling.RiwayatStaffDKA', ['riwayat' => $riwayat]);
    }
    


    public function RiwayatMahasiswa(Request $request)
    {
        $Nim = $request->session()->get('nim');
        $riwayat = Konseling::where('nim', $Nim)
        ->where('status', 'Selesai')
        ->get();
    
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
    
        return view('Riwayat_Konseling.RiwayatMahasiswa', ['riwayat' => $riwayat]);
    }


    public function RiwayatKonselor()
    {
        // Mendapatkan ID Konselor dari session (sesuaikan dengan cara Anda menyimpan ID konselor pada session)
        $idKonselor = session('id');

        $riwayat = Jadwal::where('id_konselor', $idKonselor)
        ->where('status', 'Selesai')
        ->get();

        foreach ($riwayat as $jadwal) {
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
        return view('Riwayat_Konseling.RiwayatKonselor', ['riwayat' => $riwayat]);
    }



    public function kirimFeedback(Request $request)
    {
        $response = ['success' => false, 'message' => 'Gagal Mengirim Feedback.'];
    
        try {
            $id = $request->input('id');
            $feedback = $request->input('feedback');
    
            if (!empty($id)) {
                $konseling = Konseling::find($id);
    
                if ($konseling) {
                    $konseling->feedback = $feedback;
                    $konseling->save();
    
                    $response = ['success' => true, 'message' => 'Feedback berhasil disimpan.'];
                } else {
                    $response = ['success' => false, 'message' => 'Data Konseling tidak ditemukan.'];
                }
            } else {
                $response = ['success' => false, 'message' => 'Data tidak ditemukan.'];
            }
        } catch (\Exception $ex) {
            $response = ['success' => false, 'message' => $ex->getMessage()];
        }
    
        return response()->json($response);
    }




    public function RiwayatProdi(Request $request)
    {
        $prodi = $request->session()->get('id_prodi');
        
        $riwayat = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
        ->join('prodis', 'mahasiswas.prodi', '=', 'prodis.id_prodi')
        ->where('konselings.status', '=', 'Selesai')
        ->where('mahasiswas.prodi', $prodi) 
        ->where('konselings.jenis_konseling', '=', 'Akademik') 
        ->select('konselings.*', 'mahasiswas.nama_mahasiswa', 'prodis.nama_prodi')
        ->get();
    
        return view('Riwayat_Konseling.RiwayatProdi', ['riwayat' => $riwayat]);
    }


    public function downloadFile(Request $request)
    {
        $pathfile = $request->input('pathfile');
        $path = storage_path('app/' . $pathfile);
    
        if (file_exists($path)) {
            $file = basename($path);
            return response()->download($path, $file);
        } else {
            return response()->json(['message' => 'File not found'], 404);
        }
    }
    
    
}
