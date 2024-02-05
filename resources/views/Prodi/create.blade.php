@extends('layouts.layoutDKA')

@section('title','Tambah Prodi')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Data Prodi / Tambah Data</h6>
</section>
<br />
<br />

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('Prodi.index') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="nama_prodi" class="col-sm-3 col-form-label">Nama Prodi<span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required=""
                        oninvalid="this.setCustomValidity('Nama Prodi Wajib Diisi!')"
                        oninput="this.setCustomValidity('')"
                        style="border-width: 2px; border-style: solid; border-color: #ccc;">

                    @if ($errors->has('nama_prodi'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                alert("{{ $errors->first('nama_prodi') }}");
                            });
                        </script>
                    @endif
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <label for="nama_sekprod" class="col-sm-3 col-form-label">Sekretaris Prodi<span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_sekprod" name="nama_sekprod" required=""
                    oninvalid="this.setCustomValidity('Nama Sekretaris Prodi Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <label for="nomor_hp" class="col-sm-3 col-form-label">No Handphone<span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" required=""
                        oninvalid="this.setCustomValidity('Nama No Handphone Wajib Diisi!')"
                        oninput="this.setCustomValidity('')"
                        style="border-width: 2px; border-style: solid; border-color: #ccc;"
                        maxlength="13">
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email<span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" required=""
                        oninvalid="this.setCustomValidity('Email Wajib Diisi dengan format yang sesuai!')"
                        oninput="this.setCustomValidity('')"
                        style="border-width: 2px; border-style: solid; border-color: #ccc;">
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Nama Akun<span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="username" name="username" required=""
                        oninvalid="this.setCustomValidity('Nama Akun Wajib Diisi!')"
                        oninput="this.setCustomValidity('')"
                        style="border-width: 2px; border-style: solid; border-color: #ccc;">
                
                    @if($errors->has('username'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                alert("{{ $errors->first('username') }}");
                            });
                        </script>
                    @endif
                    </div>
                </div>
                <br />

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Kata Sandi<span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required=""
                            oninvalid="this.setCustomValidity('Kata Sandi Wajib Diisi!')"
                            oninput="this.setCustomValidity('')"
                            style="border-width: 2px; border-style: solid; border-color: #ccc;">

                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    </div>
                </div>
                <br />

                <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
                <script>
                    const passwordInput = document.getElementById('password');
                    const togglePasswordButton = document.getElementById('togglePassword');

                    togglePasswordButton.addEventListener('click', function () {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);

                        const eyeIcon = type === 'password' ? 'fa-eye' : 'fa-eye-slash';
                        togglePasswordButton.innerHTML = `<i class="fas ${eyeIcon}"></i>`;
                    });
                </script>



                <div class="col-12" style="display: none;">
                    <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="status" name="status" value="Aktif" readonly>
                </div>

                <br>
                        <div class="form-group row text-right">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-sm ml-2">
                                    <i class="fas fa-save"></i> Simpan
                                </button>

                                <button type="button" class="btn btn-danger btn-sm" onclick="goBack();">
                                    <i class="fas fa-times"></i> Batal
                                </button>

                                <script>
                                    function goBack() {
                                        window.history.back();
                                    }
                                </script>
                            </div>
                        </div>
            </form><!-- Vertical Form -->
            </div>
    </div>
</div>
</main>
<!-- End - Main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@endsection