<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\Konselor;


class Jadwal_KonselingController extends Controller
{

    public function JadwalStaffDKA()
    {
        $catatan = Jadwal::all();

        foreach ($catatan as $jadwal) {
            $id_konseling_jadwal = $jadwal->id_konseling;

            $konseling = Konseling::join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
                ->join('prodis', 'mahasiswas.prodi', '=', 'prodis.id_prodi')
                ->where('konselings.id_konseling', $id_konseling_jadwal)
                ->first();

            $konselor = Konselor::find($jadwal->id_konselor);

            if ($konseling && $konselor) {
                $jadwal->id_konseling = $id_konseling_jadwal;
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
        return view('Jadwal_Konseling.JadwalStaffDKA', ['jadwal' => $catatan]);
    }


    public function JadwalMahasiswa(Request $request)
    {
        $catatan = Jadwal::all();
        $nim = $request->session()->get('nim');

        // Inisialisasi array untuk menampung jadwal yang sesuai
        $jadwalSesuai = [];

        foreach ($catatan as $jadwal) {
            $id_konseling_jadwal = $jadwal->id_konseling;

            $konseling = Konseling::join('mahasiswas', function ($join) use ($nim) {
                $join->on('konselings.nim', '=', 'mahasiswas.id')
                    ->where('konselings.nim', '=', $nim);
            })
            ->join('prodis', 'mahasiswas.prodi', '=', 'prodis.id_prodi')
            ->where('konselings.id_konseling', $id_konseling_jadwal)
            ->first();

            $konselor = Konselor::find($jadwal->id_konselor);

            // Tambahan validasi status jadwal
            if ($konseling && $konselor && $jadwal->status === 'ACC') {
                $jadwal->id_konseling = $id_konseling_jadwal;
                $jadwal->jenis_konseling = $konseling->jenis_konseling;
                $jadwal->nama_mahasiswa = $konseling->nama_mahasiswa;
                $jadwal->nama_konselor = $konselor->nama_konselor;
                $jadwal->nama_prodi = $konseling->nama_prodi;

                // Menambahkan jadwal yang sesuai ke dalam array
                $jadwalSesuai[] = $jadwal;
            } else {
                // Data tidak sesuai atau status jadwal tidak ACC, lanjut ke iterasi berikutnya
                continue;
            }
        }

        return view('Jadwal_Konseling.JadwalMahasiswa', ['jadwal' => $jadwalSesuai]);
    }



    public function KonfirmasiJadwal(Request $request)
    {
        $catatan = Jadwal::all();
        $nim = $request->session()->get('nim');

        // Inisialisasi array untuk menampung jadwal yang sesuai
        $jadwalSesuai = [];

        foreach ($catatan as $jadwal) {
            $id_konseling_jadwal = $jadwal->id_konseling;

            $konseling = Konseling::join('mahasiswas', function ($join) use ($nim) {
                $join->on('konselings.nim', '=', 'mahasiswas.id')
                    ->where('konselings.nim', '=', $nim);
            })
            ->join('prodis', 'mahasiswas.prodi', '=', 'prodis.id_prodi')
            ->where('konselings.id_konseling', $id_konseling_jadwal)
            ->first();

            $konselor = Konselor::find($jadwal->id_konselor);

            // Tambahan validasi status jadwal
            if ($konseling && $konselor && $jadwal->status === 'Terjadwal') {
                $jadwal->id_konseling = $id_konseling_jadwal;
                $jadwal->jenis_konseling = $konseling->jenis_konseling;
                $jadwal->nama_mahasiswa = $konseling->nama_mahasiswa;
                $jadwal->nama_konselor = $konselor->nama_konselor;
                $jadwal->nama_prodi = $konseling->nama_prodi;

                // Menambahkan jadwal yang sesuai ke dalam array
                $jadwalSesuai[] = $jadwal;
            } else {
                // Data tidak sesuai atau status jadwal tidak ACC, lanjut ke iterasi berikutnya
                continue;
            }
        }
        return view('Jadwal_Konseling.KonfirmasiJadwal', ['jadwal' => $jadwalSesuai]);
    }


    public function confirmStatus(Request $request, $idJadwal, $idKonseling)
    {
        // Ubah status pada model Konseling
        $konseling = Konseling::find($idKonseling);
    
        if (!$konseling) {
            return response()->json(['success' => false, 'message' => 'Konseling tidak ditemukan']);
        }
    
        $konseling->update(['status' => 'Pelaksanaan']);
    
        // Ubah status pada model Jadwal
        $jadwal = Jadwal::find($idJadwal);
    
        if (!$jadwal) {
            return response()->json(['success' => false, 'message' => 'Jadwal tidak ditemukan']);
        }
    
        $jadwal->update(['status' => 'ACC']);
    
        return response()->json(['success' => true, 'message' => 'Status konseling dan jadwal berhasil diubah menjadi pelaksanaan']);
    }


    public function reschedule(Request $request, $idJadwal, $idKonseling)
    {
        // Ubah status pada model Konseling
        $konseling = Konseling::find($idKonseling);
    
        if (!$konseling) {
            return response()->json(['success' => false, 'message' => 'Konseling tidak ditemukan']);
        }

        if ($konseling->feedback === 'reschedule') {
            return response()->json(['success' => false, 'message' => 'Anda hanya bisa melakukan reschedule sekali']);
        }
    
        $konseling->update([
            'status' => 'Dikonfirmasi',
            'feedback' => 'reschedule'
        ]);
        
    
        // Ubah status pada model Jadwal
        $jadwal = Jadwal::find($idJadwal);
    
        if (!$jadwal) {
            return response()->json(['success' => false, 'message' => 'Jadwal tidak ditemukan']);
        }
    
        $jadwal->update(['status' => 'Batal']);
    
        return response()->json(['success' => true, 'message' => 'Status konseling dan jadwal berhasil diubah menjadi pelaksanaan']);
    }




    public function JadwalProdi(Request $request)
    {
        $prodi = $request->session()->get('id_prodi');
    
        $catatan = Jadwal::join('konselings', 'jadwals.id_konseling', '=', 'konselings.id_konseling')
            ->join('mahasiswas', 'konselings.nim', '=', 'mahasiswas.id')
            ->join('prodis', 'mahasiswas.prodi', '=', 'prodis.id_prodi')
            ->join('konselors', 'jadwals.id_konselor', '=', 'konselors.id_konselor')
            ->where('jadwals.status', '=', 'ACC')
            ->where('mahasiswas.prodi', $prodi) // Menambahkan kondisi prodi
            ->select('jadwals.*', 'konselings.jenis_konseling', 'mahasiswas.nama_mahasiswa', 'konselors.nama_konselor', 'prodis.nama_prodi')
            ->get();
    
        return view('Jadwal_Konseling.JadwalProdi', ['jadwal' => $catatan]);
    }
    

}
