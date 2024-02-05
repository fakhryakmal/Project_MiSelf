<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonselorController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\Hasil_Akhir_KonselingController;
use App\Http\Controllers\Riwayat_KonselingController;
use App\Http\Controllers\Jadwal_KonselingController;
use App\Http\Controllers\Penjadwalan_KonselingController;
use App\Http\Controllers\Konseling_NonAkademikController;
use App\Http\Controllers\Konseling_AkademikController;
use App\Http\Controllers\Pelaksanaan_KonselingController;
use App\Http\Controllers\Konfirmasi_PengajuanController;

Route::get('/', function () {
    return view('AboutMe.Index');
});

Route::get('login',[LoginController::class,'Index'])->name('Login.Index');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/Logout', [LoginController::class, 'Logout'])->name('Login.Logout');
Route::get('aboutme',[AboutMeController::class,'Index'])->name('AboutMe.Index');

Route::get('dashboard/DKA',[DashboardController::class,'index_DKA'])->name('Dashboard.dashboard_DKA');
Route::get('dashboard/Mahasiswa',[DashboardController::class,'index_Mahasiswa'])->name('Dashboard.dashboard_Mahasiswa');
Route::get('dashboard/Konselor',[DashboardController::class,'index_Konselor'])->name('Dashboard.dashboard_Konselor');
Route::get('dashboard/Prodi',[DashboardController::class,'index_Prodi'])->name('Dashboard.dashboard_Prodi');

Route::get('Prodi',[ProdiController::class,'index'])->name('Prodi.index');
Route::get('Prodi/create',[ProdiController::class,'create'])->name('Prodi.create');
Route::post('Prodi',[ProdiController::class,'store'])->name('Prodi.store');
Route::get('Prodi/{id_prodi}/edit',[ProdiController::class,'edit'])->name('Prodi.edit');
Route::put('Prodi/{id_prodi}',[ProdiController::class,'update'])->name('Prodi.update');
Route::delete('Prodi/{id_prodi}',[ProdiController::class,'destroy'])->name('Prodi.destroy');

Route::get('konselors',[KonselorController::class,'index'])->name('konselors.index');
Route::get('konselors/create',[KonselorController::class,'create'])->name('konselors.create');
Route::post('konselors',[KonselorController::class,'store'])->name('konselors.store');
Route::get('konselors/{id}/edit',[KonselorController::class,'edit'])->name('konselors.edit');
Route::put('konselors/{id}',[KonselorController::class,'update'])->name('konselors.update');
Route::delete('konselors/{id}',[KonselorController::class,'destroy'])->name('konselors.destroy');
Route::post('/konselors/{id}/confirm', [KonselorController::class,'confirm'])->name('konselors.confirm');

Route::get('Hasil_Akhir_Konseling/HasilAkhir',[Hasil_Akhir_KonselingController::class,'HasilAkhir'])->name('Hasil_Akhir_Konseling.HasilAkhir');
Route::get('Hasil_Akhir_Konseling/CatatanKonseling',[Hasil_Akhir_KonselingController::class,'CatatanKonseling'])->name('Hasil_Akhir_Konseling.CatatanKonseling');
Route::post('Hasil_Akhir_Konseling/save-file', [Hasil_Akhir_KonselingController::class, 'saveFile'])->name('Hasil_Akhir_Konseling.save-file');

Route::get('Riwayat_Konseling/RiwayatStaffDKA',[Riwayat_KonselingController::class,'RiwayatStaffDKA'])->name('Riwayat_Konseling.RiwayatStaffDKA');
Route::get('Riwayat_Konseling/RiwayatMahasiswa',[Riwayat_KonselingController::class,'RiwayatMahasiswa'])->name('Riwayat_Konseling.RiwayatMahasiswa');
Route::get('Riwayat_Konseling/RiwayatKonselor',[Riwayat_KonselingController::class,'RiwayatKonselor'])->name('Riwayat_Konseling.RiwayatKonselor');
Route::get('Riwayat_Konseling/RiwayatProdi',[Riwayat_KonselingController::class,'RiwayatProdi'])->name('Riwayat_Konseling.RiwayatProdi');
Route::post('/Riwayat/Kirim_Feedback', [Riwayat_KonselingController::class, 'kirimFeedback'])->name('kirim.feedback');
Route::post('/download', [Riwayat_KonselingController::class, 'downloadFile'])->name('download.file');

Route::get('Jadwal_Konseling/JadwalStaffDKA',[Jadwal_KonselingController::class,'JadwalStaffDKA'])->name('Jadwal_Konseling.JadwalStaffDKA');
Route::get('Jadwal_Konseling/JadwalMahasiswa',[Jadwal_KonselingController::class,'JadwalMahasiswa'])->name('Jadwal_Konseling.JadwalMahasiswa');
Route::get('Jadwal_Konseling/KonfirmasiJadwal',[Jadwal_KonselingController::class,'KonfirmasiJadwal'])->name('Jadwal_Konseling.KonfirmasiJadwal');
Route::put('Jadwal_Konseling/confirm/{id_jadwal}/{id_konseling}', [Jadwal_KonselingController::class, 'confirmStatus'])->name('Jadwal_Konseling.confirm');
Route::put('Jadwal_Konseling/reschedule/{id_jadwal}/{id_konseling}', [Jadwal_KonselingController::class, 'reschedule'])->name('Jadwal_Konseling.reschedule');
Route::get('Jadwal_Konseling/JadwalProdi',[Jadwal_KonselingController::class,'JadwalProdi'])->name('Jadwal_Konseling.JadwalProdi');

Route::match(['get', 'post'],'Penjadwalan_Konseling/Index',[Penjadwalan_KonselingController::class,'Index'])->name('Penjadwalan_Konseling.Index');
Route::get('Penjadwalan_Konseling/create/{id_konseling}', [Penjadwalan_KonselingController::class, 'create'])
    ->name('Penjadwalan_Konseling.create');
Route::post('Penjadwalan_Konseling/store',[Penjadwalan_KonselingController::class,'store'])->name('Penjadwalan_Konseling.store');
Route::get('get-konselors', [Penjadwalan_KonselingController::class, 'getKonselors']);

Route::get('Konsling_NonAkademik/Data_Pengajuan',[Konseling_NonAkademikController::class,'Data_Pengajuan'])->name('Konseling_NonAkademik.Data_Pengajuan');
Route::get('Konsling_NonAkademik/create',[Konseling_NonAkademikController::class,'create'])->name('Konseling_NonAkademik.create');
Route::post('Konsling_NonAkademik',[Konseling_NonAkademikController::class,'store'])->name('Konseling_NonAkademik.store');

Route::get('Konsling_Akademik/Data_Pengajuan',[Konseling_AkademikController::class,'Data_Pengajuan'])->name('Konseling_Akademik.Data_Pengajuan');
Route::get('Konsling_Akademik/Index', [Konseling_AkademikController::class, 'index'])->name('Konseling_Akademik.index');
Route::post('Konsling_Akademik/ajukan', [Konseling_AkademikController::class, 'ajukanKonseling'])->name('Konseling_Akademik.ajukan');

Route::get('Konfirmasi_Pengajuan/Index',[Konfirmasi_PengajuanController::class,'Index'])->name('Konfirmasi_Pengajuan.Index');
Route::delete('Konfirmasi_Pengajuan.Konfirmasi/{id}',[Konfirmasi_PengajuanController::class,'Konfirmasi'])->name('Konfirmasi_Pengajuan.Konfirmasi');

Route::get('Pelaksanaan_Konseling/Index',[Pelaksanaan_KonselingController::class,'Index'])->name('Pelaksanaan_Konseling.Index');
Route::put('Pelaksanaan_Konseling/selesai/{id_jadwal}/{id_konseling}', [Pelaksanaan_KonselingController::class, 'selesai'])->name('Pelaksanaan_Konseling.selesai');
Route::put('Pelaksanaan_Konseling/lanjut/{id_jadwal}/{id_konseling}', [Pelaksanaan_KonselingController::class, 'lanjut'])->name('Pelaksanaan_Konseling.lanjut');

