
  <nav class="navbar navbar-expand-lg navbar-light light">
        <a class="navbar-brand" style="padding: 8px 40px;" href="#">
            <img src="{{ asset('Content/Images/IMG_1687.png') }}" alt="Logo Politeknik Astra" style="height: 50px;" />
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-2">
                    <a id="linkDropdown" class="nav-link dropdown-toggle font-weight-bold waves-effect waves-light white-text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 8px 40px; background-color: #0059AB; border-radius: 10px;">
                        <b style="font-weight: bold;">About Me</b>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="linkDropdown">
                        <a class="dropdown-item" href="#carousel-section">About Me</a>
                        <a class="dropdown-item" href="#doctors">Profile Konselor</a>
                        <a class="dropdown-item" href="#our-values">Artikel Kesehatan Mental</a>
                    </div>
                </li>

                <li class="nav-item mr-2">
                    <a id="linkFormulir" class="nav-link font-weight-bold waves-effect waves-light white-text" href="{{ route('Login.Index') }}" style="padding: 8px 40px; background-color: #0059AB; border-radius: 10px;">
                        <b style="font-weight: bold;">MASUK</b>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <main>
        @yield('content')
    </main>

    <div class="footer">
        <div class="row">
            <div class="col-lg-4 socialmedia" style="padding: 20px 40px; text-align: left;">
                <h6 style="font-weight: bold; margin-bottom: 15px;">POLITEKNIK ASTRA</h6>
                <p>
                    <b>Kampus Cikarang:</b><br />
                    Jl. Gaharu Blok F-3 Delta Silicon 2 Lippo Cikarang, Kel. Cibatu, Kec. Cikarang Selatan, Bekasi, Jawa Barat 17530
                </p>
                <p>
                    <b>Kampus Sunter:</b><br />
                    Komplek PT Astra International Tbk. Gedung B, Jl. Gaya Motor Raya No. 8, Sunter II, Jakarta 14330
                </p>
            </div>
            <div class="col-lg-4 socialmedia" style="padding: 20px 40px; text-align: left;">
                <h6 style="font-weight: bold;">WAKTU LAYANAN</h6>
                <h6>Senin - Jumat (08:00 - 16:00 WIB)</h6>
                <br />
                <h6 style="font-weight: bold;">LINK CEPAT</h6>
                <a href="https://goo.gl/maps/5VCNFxoCRRUwBF547" style="text-decoration: none; color: white;" target="_blank">
                    <h6>- Lokasi Kampus</h6>
                </a>
                <a href="https://sia.polytechnic.astra.ac.id" style="text-decoration: none; color: white;" target="_blank">
                    <h6>- Sistem Informasi Akademik</h6>
                </a>
                <a href="Page_Login.aspx" style="text-decoration: none; color: white;" target="_blank">
                    <h6>- Login Akun PMB</h6>
                </a>
            </div>
            <div class="col-lg-4 socialmedia" style="padding: 20px 40px; text-align: left;">
                <h6 style="margin-bottom: 20px;">
                    <span style="font-weight: bold;">Telepon</span> : (021) 5022722<br />
                    <span style="font-weight: bold;">Whatsapp</span> : 0812 9558 2134 (message only)<br />
                    <span style="font-weight: bold;">Email</span> : pmb@polytechnic.astra.ac.id<br />
                    <span style="font-weight: bold;">Website</span> : https://www.polytechnic.astra.ac.id
                </h6>
                <a class="btn-floating btn-md btn-ins" style="margin: 10px 5px;" role="button" onclick="window.open('https://www.instagram.com/astrapolytechnic/', '_blank');"><i class="fab fa-instagram"></i></a>
                <a class="btn-floating btn-md btn-yt" style="margin: 10px 5px;" role="button" onclick="window.open('https://www.youtube.com/c/PolmanAstrachannel', '_blank');"><i class="fab fa-youtube"></i></a>
                <a class="btn-floating btn-md btn-fb" style="margin: 10px 5px;" role="button" onclick="window.open('https://www.facebook.com/Astrapolytechnic/', '_blank');"><i class="fab fa-facebook-f"></i></a>
                <a class="btn-floating btn-md btn-tw" style="margin: 10px 5px;" role="button" onclick="window.open('https://twitter.com/PoliteknikAstra/', '_blank');"><i class="fab fa-twitter"></i></a>
                <a class="btn-floating btn-md btn-whatsapp" style="margin: 10px 5px;" role="button" onclick="window.open('https://api.whatsapp.com/send/?phone=6281295582134', '_blank');"><i class="fab fa-whatsapp"></i></a>
                <p class="mt-3 mb-0">&copy; 2023 Politeknik Astra</p>
            </div>
        </div>
    </div>