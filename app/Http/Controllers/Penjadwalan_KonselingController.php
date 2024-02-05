<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAturJadwalRequest;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\Konselor;


class Penjadwalan_KonselingController extends Controller
{

    public function Index()
    {
        // Mengambil semua konseling yang memiliki status "Dikonfirmasi"
        $jadwal = Konseling::where('status', 'Dikonfirmasi')
        ->orWhere('status', 'Reschedule')
        ->get();

    
        foreach ($jadwal as $konseling) {
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
        return view('Penjadwalan_Konseling.Index', ['penjadwalan' => $jadwal]);
    }
    


    public function create($id)
    {
        try {
            $jadwal = Konseling::findOrFail($id);
            return view('Penjadwalan_Konseling.create', ['jadwals' => $jadwal]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('halaman_yang_dituju')->with('error', 'Data not found.');
        }
    }

    public function getKonselors()
    {
        $konselors = Konselor::pluck('nama_konselor', 'id_konselor');
        return response()->json($konselors);
    }
    
    public function store(StoreAturJadwalRequest $request)
    {
        $param = $request->validated();
    
        // Menyimpan data ke tabel aturjadwal
        $aturjadwal = Jadwal::create($param);
    
        if ($aturjadwal) {
            // Mengubah status pada tabel konseling menjadi "Terjadwal"
            $id_konseling = $request->input('id_konseling');
            $konseling = Konseling::findOrFail($id_konseling);
            $konseling->status = 'Terjadwal';
            $konseling->save();
    
            return redirect(route('Penjadwalan_Konseling.Index'))->with('success', 'Added!');
        } else {
            return redirect(route('halaman_yang_dituju'))->with('error', 'Failed to add data.');
        }
    }

}
