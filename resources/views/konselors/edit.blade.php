@extends('layouts.layoutDKA')

@section('title', 'Edit Konselor')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Data Prodi / Perbarui Data</h6>
</section>
<br/>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                    <form method="POST" action="{{ route('konselors.update', ['id' => $konselors->id_konselor]) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Konselor<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_konselor"
                                        value="{{ old('nama_konselor', $konselors->nama_konselor) }}" placeholder="Nama" required=""
                                        oninvalid="this.setCustomValidity('Nama Konselor Wajib Diisi!')"
                                        oninput="this.setCustomValidity('')"
                                        style="border-width: 2px; border-style: solid; border-color: #ccc;">
                                </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Email Konselor<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $konselors->email) }}" placeholder="Email" required=""
                                oninvalid="this.setCustomValidity('Email Konselor Wajib Diisi!')"
                                oninput="this.setCustomValidity('')"
                                style="border-width: 2px; border-style: solid; border-color: #ccc;">
                                </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor HP<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nomor_hp"
                                        value="{{ old('nomor_hp', $konselors->nomor_hp) }}" placeholder="Nomor Telepon" required=""
                                oninvalid="this.setCustomValidity('Nomor Telepon Wajib Diisi!')"
                                oninput="this.setCustomValidity('')"
                                style="border-width: 2px; border-style: solid; border-color: #ccc;">
                                </div>
                                </div>
                              

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pendidikan <span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <select class="form-select" name="pendidikan_terakhir" style="width: 100%; border: 2px solid #ccc; height: 40px;">
                                        <option value="" selected disabled>Pilih Pendidikan Terakhir</option>
                                        <option value="SD" {{ old('pendidikan_terakhir', $konselors->pendidikan_terakhir) == 'SD' ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ old('pendidikan_terakhir', $konselors->pendidikan_terakhir) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA" {{ old('pendidikan_terakhir', $konselors->pendidikan_terakhir) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                        <option value="D3" {{ old('pendidikan_terakhir', $konselors->pendidikan_terakhir) == 'D3' ? 'selected' : '' }}>D3</option>
                                        <option value="S1" {{ old('pendidikan_terakhir', $konselors->pendidikan_terakhir) == 'S1' ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ old('pendidikan_terakhir', $konselors->pendidikan_terakhir) == 'S2' ? 'selected' : '' }}>S2</option>
                                    </select>
                                </div>
                                </div>
                             


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pengalaman<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" name="pengalaman" placeholder="Pengalaman Konselor" required=""
                                        oninvalid="this.setCustomValidity('Pengalaman Konselor Wajib Diisi!')"
                                        oninput="this.setCustomValidity('')"
                                        style="border-width: 2px; border-style: solid; border-color: #ccc;">{{ old('pengalaman', $konselors->pengalaman ?? 'Default Text') }}</textarea>
                                </div>
                                </div>
                               


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat" required=""
                                        oninvalid="this.setCustomValidity('Alamat Wajib Diisi!')"
                                        oninput="this.setCustomValidity('')"
                                        style="border-width: 2px; border-style: solid; border-color: #ccc;">{{ old('alamat', $konselors->alamat) }}</textarea>
                                </div>
                                </div>
                              


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Akun<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username"
                                        value="{{ old('username', $konselors->username) }}" placeholder="Username" required=""
                                        oninvalid="this.setCustomValidity('Nama Akun Wajib Diisi!')"
                                        oninput="this.setCustomValidity('')"
                                        style="border-width: 2px; border-style: solid; border-color: #ccc;" readonly>
                                </div>
                                </div>
                               

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kata Sandi<span style="color: red;">*</span></label>
                                    <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" 
                                            value="{{ old('password', $konselors->password) }}" placeholder="Password" required=""
                                            oninvalid="this.setCustomValidity('Kata Sandi Wajib Diisi!')"
                                            oninput="this.setCustomValidity('')"
                                            style="border-width: 2px; border-style: solid; border-color: #ccc;">

                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    </div>
                                </div>

                                <!-- Tambahkan skrip Font Awesome -->
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

                      

                                <div class="form-group row">
                                    <label for="formFile" class="col-sm-3 col-form-label">Pas Foto<span style="color: red;">*</span></label><br>
                                    <div class="col-sm-9">
                                    <label for="formFile" class="form-label">
                                        <img src="{{ asset($konselors->foto) }}" class="img-thumbnail"
                                            style="width:200px;" />
                                    </label>
                                    <input type="hidden" name="foto_old" value="{{ $konselors->foto }}">
                                    <input class="form-control" type="file" name="foto" id="foto" required=""
                                oninvalid="this.setCustomValidity('Pas Foto Wajib Diisi!')"
                                oninput="this.setCustomValidity('')"
                                style="border-width: 2px; border-style: solid; border-color: #ccc;">
                                </div>
                                </div>
                                <input type="hidden" name="status" value="Aktif">
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


</html>
@endsection