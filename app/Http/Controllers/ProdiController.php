<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;
use Illuminate\Http\Request;
use App\Models\Prodi;


class ProdiController extends Controller
{

    public function index()
    {
        $prodis = Prodi::where('status', 'Aktif')->get();
        return view('Prodi.index', ['prodis' => $prodis]);
    }
    

    public function create()
    {
        return view('Prodi.create');
    }


    public function store(StoreProdiRequest $request)
    {
        $param = $request->validated();
        if ($prodi = Prodi::create($param)) {
            $prodi->save();
            return redirect(route('Prodi.index'))->with('success', 'Added!');
        }
    }

    public function edit($id_prodi)
    {
        $prodi = Prodi::findOrFail($id_prodi);
        return view('Prodi.edit',['prodis'=>$prodi]);
    }


    public function update(UpdateProdiRequest $request, $id_prodi)
    {
        $product = Prodi::findOrFail($id_prodi);
        $params = $request->validated();

        if ($product->update($params)) {
            $product->save();
            return redirect(route('Prodi.index'))->with('success', 'Updated!');
        } else {
            return redirect(route('Prodi.index'))->with('error', 'Failed to update.');
        }
    }


    public function destroy($id_prodi)
    {
        $product = Prodi::findOrFail($id_prodi);
        $product->update(['status' => 'Tidak Aktif']);
        return redirect(route('Prodi.index'))->with('success', 'Data Berhasil Dihapus!');
    }

    public function updateStatus(Prodi $prodi)
    {
        $newStatus = $prodi->status == 'active' ? 'inactive' : 'active';
        $prodi->update(['status' => $newStatus]);

        return redirect(route('Prodi.index'))->with('success', 'Status Updated!');
    }
    
}
