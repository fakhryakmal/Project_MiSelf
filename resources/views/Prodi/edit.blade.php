@extends('layouts.layoutDKA')

@section('title', 'Edit Prodi')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Data Prodi / Perbarui Data</h6>
</section>
<br />
<br />

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{ route('Prodi.update', $prodis->id_prodi) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Prodi <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_prodi" value="{{ $prodis->nama_prodi }}" required=""
                            oninvalid="this.setCustomValidity('Nama Prodi Wajib Diisi!')"
                            oninput="this.setCustomValidity('')"
                            style="border-width: 2px; border-style: solid; border-color: #ccc;"readonly>
                            </div>
                        </div>
                        <br />

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sekretaris Prodi <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_sekprod" value="{{ $prodis->nama_sekprod }}" required=""
                            oninvalid="this.setCustomValidity('Nama Sekretaris Prodi Wajib Diisi!')"
                            oninput="this.setCustomValidity('')"
                            style="border-width: 2px; border-style: solid; border-color: #ccc;">
                            </div>
                        </div>
                        <br />

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No Handphone <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                            <input type="number" class="form-control" name="nomor_hp" value="{{ $prodis->nomor_hp }}" required=""
                            oninvalid="this.setCustomValidity('No Handphone Wajib Diisi!')"
                            oninput="this.setCustomValidity('')"
                            style="border-width: 2px; border-style: solid; border-color: #ccc;"
                            maxlength="13">
                            </div>
                        </div>
                        <br />

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="{{ $prodis->email }}" required=""
                            oninvalid="this.setCustomValidity('Email Wajib Diisi dengan format yang benar!')"
                            oninput="this.setCustomValidity('')"
                            style="border-width: 2px; border-style: solid; border-color: #ccc;">
                            </div>
                        </div>
                        <br />

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Akun <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" value="{{ $prodis->username }}" required=""
                                oninvalid="this.setCustomValidity('Nama Akun Diisi!')"
                                oninput="this.setCustomValidity('')"
                                style="border-width: 2px; border-style: solid; border-color: #ccc;" readonly>
                            </div>
                        </div>
                        <br />


                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kata Sandi <span style="color: red;">*</span></label>
                            <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" value="{{ $prodis->password }}" required=""
                                    oninvalid="this.setCustomValidity('Kata Sandi Diisi!')"
                                    oninput="this.setCustomValidity('')"
                                    style="border-width: 2px; border-style: solid; border-color: #ccc;">

                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            </div>
                        </div>

                        <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
                        <script>
                            const passwordInput = document.querySelector('input[name="password"]');
                            const togglePasswordButton = document.getElementById('togglePassword');

                            togglePasswordButton.addEventListener('click', function () {
                                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                passwordInput.setAttribute('type', type);

                                const eyeIcon = type === 'password' ? 'fa-eye' : 'fa-eye-slash';
                                togglePasswordButton.innerHTML = `<i class="fas ${eyeIcon}"></i>`;
                            });
                        </script>


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
            </form>
            </div>
    </div>
</div>
</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@endsection
