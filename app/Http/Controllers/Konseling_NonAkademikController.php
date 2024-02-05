<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Konselor;
use App\Http\Requests\StoreAjukanRequest;


class Konseling_NonAkademikController extends Controller
{
    public function Data_Pengajuan(Request $request)
    {
        $nim = $request->session()->get('nim');
    
        // Mengambil data konseling yang sesuai dengan NIM
        $nonakademik = Konseling::where('nim', $nim)
        ->where('status', '!=','Selesai')
        ->get();
    
        foreach ($nonakademik as $konseling) {
            // Tambahkan logika untuk mengambil data mahasiswa sesuai NIM
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
    
        return view('Konseling_NonAkademik.Data_Pengajuan', ['nonakademik' => $nonakademik]);
    }
    

    public function create()
    {
        return view('Konseling_NonAkademik.create');
    }


    public function store(StoreAjukanRequest $request)
    {
        $param = $request->validated();
        if ($ajukan = Konseling::create($param)) {
            $ajukan->save();
            return redirect(route('Konseling_NonAkademik.Data_Pengajuan'))->with('success', 'Added!');
        }
    }
}
