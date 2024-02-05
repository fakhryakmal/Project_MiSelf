<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konseling;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\Konselor;


class Hasil_Akhir_KonselingController extends Controller
{

    public function HasilAkhir()
    {
        $hasil = Konseling::where('status', 'Tunggu Hasil')->get();

        foreach ($hasil as $konseling) {
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

        return view('Hasil_Akhir_Konseling.HasilAkhir', ['hasilakhir' => $hasil]);
    }



    public function CatatanKonseling()
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

        return view('Hasil_Akhir_Konseling.CatatanKonseling', ['hasilakhir' => $catatan]);
    }


    
    public function saveFile(Request $request)
{
    try {
        $idKonseling = $request->input('id_konseling');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Generate nama baru untuk file hasil akhir
            $newFileName = 'Hasil Akhir KSL-' . $idKonseling . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('public/konseling_files', $newFileName);

            Konseling::where('id_konseling', $idKonseling)
                ->update([
                    'hasil_akhir' => $filePath,
                    'status' => 'Selesai',
                ]);

            return response()->json(['message' => 'File uploaded successfully.']);
        } else {
            return response()->json(['message' => 'No file uploaded.'], 400);
        }
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error uploading file: ' . $e->getMessage()], 500);
    }
}









    public function store(StoreCounsellingRequest $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalName();
        

        // Simpan file ke direktori storage/app/file
        $file->storeAs('file', $fileName);

        // Generate new ID
        $latestCounselling = Counselling::latest()->first();
        $latestId = $latestCounselling ? $latestCounselling->id : 0;
        $newId = 'KSL' . sprintf('%03d', intval(substr($latestId, 3)) + 1);

        // Set parameters
        $param = $request->validated();
        $param['id'] = $newId;
        $param['file'] = $fileName;

        // Create new Counselling
        if ($counselling = Counselling::create($param)) {
            return redirect(route('counsellings.index'))->with('success', 'Added!');
        }

        // Rollback jika penyimpanan ke database gagal
        Storage::delete('file/' . $fileName);
        return redirect(route('counsellings.index'))->with('error', 'Failed to add Counselling.');
    }

}
