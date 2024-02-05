
<header>
        <div class="polman-nav-static-top">
            <div class="float-left">
                <a href="#">
                    <img src="{{ asset('Content/Images/IMG_1687.png') }}" style="height: 50px;" />
                </a>
            </div>

            <div class="polman-menu" style="margin-right: 50px;">
                <nav class="nav justify-content-end" style="padding-top: 5px;">
                    <b id="username1" style="position: absolute;">RAISSA MAHARANI (STAFF DKA)</b>
                    <span id="lastlogin" style="font-size: 11px; margin-top: -2px; width: 500px; text-align: right;">
                        <br /><br />Masuk terakhir: {{ \Carbon\Carbon::parse(session('last_login'))->formatLocalized('%d %B %Y, %H:%M WIB') }}
                    </span>
                </nav>
            </div>

            <div class="polman-notifikasi" onclick="redirectNotifikasi();">
                <div class="float-right">
                    <div class="fa fa-envelope fa-2x" style="margin-top: 8px; margin-right: 15px; cursor: pointer;" aria-hidden="true"></div>
                    <span class="badge badge-pill badge-info polman-badge">0</span>
                </div>
            </div>
        </div>
    </header>

    <div class="polman-nav-static-right collapse scrollstyle" id="menu">
        <div id="accordions" role="tablist" aria-multiselectable="true">
            <div class="list-group">
                <a href="{{ route('Dashboard.dashboard_DKA') }}" class='list-group-item list-group-item-action ' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class='fa fa-home fa-lg fa-pull-left'></i>Dashboard
                </a>

                <a href="{{ route('Prodi.index') }}" class='list-group-item list-group-item-action ' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class="fas fa-book fa-lg fa-pull-left"></i>Data Prodi
                </a>

                <a href="{{ route('konselors.index') }}" class='list-group-item list-group-item-action ' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class="fas fa-user fa-lg fa-pull-left"></i>Data Konselor
                </a>

                <a href="{{ route('Konfirmasi_Pengajuan.Index') }}" class='list-group-item list-group-item-action ' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class='fa fa-calendar fa-lg fa-pull-left'></i>Pengajuan Konseling
                </a>

                <a href='#menu1' role='tab' class='list-group-item list-group-item-action' data-toggle='collapse' data-parent='#accordion' aria-expanded='false' aria-controls='menu1' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                     <i class="fas fa-calendar-alt fa-lg fa-pull-left"></i>Jadwal Konseling
                </a>
                <div id='menu1' class='collapse' role='tabpanel'>
                    <a href="{{ route('Penjadwalan_Konseling.Index') }}" class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 40px; display: inherit;'>
                        <i class="fas fa-minus"></i> Atur Jadwal
                    </a>
                    <a href="{{ route('Jadwal_Konseling.JadwalStaffDKA') }}" class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 40px; display: inherit;'>
                        <i class="fas fa-minus"></i> Lihat Jadwal
                    </a>
                </div>

                <a href="{{ route('Hasil_Akhir_Konseling.HasilAkhir') }}" class='list-group-item list-group-item-action ' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class="fas fa-file-archive fa-lg fa-pull-left"></i>Hasil Konseling
                </a>
                
                <div id='menu2' class='collapse' role='tabpanel'>
                    <a href="{{ route('Hasil_Akhir_Konseling.CatatanKonseling') }}" class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 40px; display: inherit;'>
                        <i class="fas fa-minus"></i> Catatan Konseling
                    </a>
                    <a href="{{ route('Hasil_Akhir_Konseling.HasilAkhir') }}" class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 40px; display: inherit;'>
                        <i class="fas fa-minus"></i> Hasil Konseling
                    </a>
                </div>
                
                <a href="{{ route('Riwayat_Konseling.RiwayatStaffDKA') }}" class='list-group-item list-group-item-action ' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class="fas fa-history fa-lg fa-pull-left"></i>Riwayat Konseling
                </a>
                <a href="{{ route('Login.Logout') }}" class='list-group-item list-group-item-action ' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class="fa fa-sign-out fa-lg fa-pull-left"></i>Logout
                </a>
            </div>
        </div>
    </div>