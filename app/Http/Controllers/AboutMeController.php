<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Konselor;
use App\Models\Prodi;

class AboutMeController extends Controller
{
    public function index()
    {
        return view('AboutMe.Index');
    }
}
