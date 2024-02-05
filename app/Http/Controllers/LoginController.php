<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Konselor;
use App\Models\Prodi;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.Index');
    }



    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'Username.required' => 'Username wajib diisi.',
            'Password.required' => 'Password wajib diisi.'
        ]);

        $info = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ];

        $mahasiswa = Mahasiswa::where('username', $info['username'])->first();
        $konselor = Konselor::where('username', $info['username'])->first();
        $prodi = Prodi::where('username', $info['username'])->first();


        if ($mahasiswa) {
            if ($mahasiswa->password == $info['password']) {
                $request->session()->put('user_name', $mahasiswa->nama_mahasiswa);
                $request->session()->put('nim', $mahasiswa->id);
                $request->session()->put('last_login', now());
                return redirect(route('Dashboard.dashboard_Mahasiswa'))->with('success', 'Login Berhasil!');
            } else {
                return redirect(route('Login.Index'))->with('error', 'Kata Sandi Salah!');
            }
        }


        else if ($konselor) {
            if ($konselor->password == $info['password']) {
                $request->session()->put('user_name', $konselor->nama_konselor);
                $request->session()->put('id', $konselor->id_konselor);
                $request->session()->put('last_login', now());
                return redirect(route('Dashboard.dashboard_Konselor'))->with('success', 'Login Berhasil!');
            } else {
                return redirect(route('Login.Index'))->with('error', 'Kata Sandi Salah!');
            }
        }


        else if ($prodi) {
            if ($prodi->password == $info['password']) {
                $request->session()->put('user_name', $prodi->nama_prodi);
                $request->session()->put('id_prodi', $prodi->id_prodi);
                $request->session()->put('last_login', now());
                return redirect(route('Dashboard.dashboard_Prodi'))->with('success', 'Login Berhasil!');
            } else {
                return redirect(route('Login.Index'))->with('error', 'Kata Sandi Salah!');
            }
        }

        else if ($info['username'] == 'admin' && $info['password'] == 'admin') {
            $request->session()->put('last_login', now());
            return redirect(route('Dashboard.dashboard_DKA'))->with('success', 'Login Berhasil!');
        }

        return redirect(route('Login.Index'))->with('error', 'Akun Tidak Tersedia!');

    }



    public function Logout()
    {
        Auth::logout();

        return redirect()->route('AboutMe.Index');
    }
}
