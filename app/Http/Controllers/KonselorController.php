<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreKonselorRequest;
use App\Http\Requests\UpdateKonselorRequest;
use App\Models\Konselor;
use Illuminate\Http\Request;

class KonselorController extends Controller
{
    public function index()
    {
        $konselors = Konselor::where('status', 'Aktif')->get();
        return view('konselors.index', ['konselors' => $konselors]);
    }
    
    public function create()
    {
        return view('konselors.create');
    }

    public function store(StoreKonselorRequest $request)
    {
        $imageName = time() . '.' . $request->foto->extension();
        $uploadedImage = $request->foto->move(public_path('foto'), $imageName);
        $imagePath = 'foto/' . $imageName;
        
        $param = $request->validated();
        if ($konselor = Konselor::create($param)) {
            $konselor->foto = $imagePath;
            $konselor->save();
    
            return redirect(route('konselors.index'))->with('success', 'Added!');
        }
    }

    public function edit($id)
    {
        $konselor = Konselor::findOrFail($id);
        return view('konselors.edit', ['konselors' => $konselor]);
    }


    public function update(UpdateKonselorRequest $request, $id)
{
    $konselor = Konselor::findOrFail($id);
    $params = $request->validated();

    // Memeriksa apakah ada file foto yang diunggah
    if ($request->hasFile('foto')) {
        // Menghapus foto yang sebelumnya (optional)
        // Anda bisa menggantinya dengan proses penyimpanan yang sesuai dengan kebutuhan Anda
        if (file_exists(public_path($konselor->foto))) {
            unlink(public_path($konselor->foto));
        }

        // Proses pengunggahan foto yang baru
        $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
        $params['foto'] = 'foto/' . $request->file('foto')->getClientOriginalName();
    }

    // Melakukan update pada model Konselor
    if ($konselor->update($params)) {
        return redirect(route('konselors.index'))->with('success', 'Updated!');
    }
}


    public function destroy($id)
    {
        $konselor = Konselor::findOrFail($id);
        $konselor->update(['status' => 'Tidak Aktif']);
        return redirect(route('konselors.index'))->with('error', 'Sorry, unable to delete this!');
    }
}



