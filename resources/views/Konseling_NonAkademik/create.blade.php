@extends('layouts.layoutMahasiswa')

@section('title','Pengajuan Konseling')

@section('contents')
<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Data Pengajuan Konseling / Ajukan Konseling</h6>
</section>
<br/>

<!-- Main -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Setengah lebar layar untuk formulir -->
            <div class="col-md-6">

            <form action="{{ route('Konseling_NonAkademik.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12" style="display: none;">
                    <label for="nim" class="form-label">NIM<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ session('nim') }}" readonly
                    oninvalid="this.setCustomValidity('NIM Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                </div>

                <div class="col-12">
                    <label for="jenis_konseling" class="form-label">Jenis Konseling<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="jenis_konseling" name="jenis_konseling" value='Non Akademik' readonly
                    oninvalid="this.setCustomValidity('Jenis Konseling Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                </div>
                <br />

                <div class="col-12">
                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ now()->toDateString() }}" readonly
                    oninvalid="this.setCustomValidity('Tanggal Pengajuan Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                </div>
                <br />

                <script>
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
                    var yyyy = today.getFullYear();

                    today = yyyy + '-' + mm + '-' + dd;
                    document.getElementById("tanggal_pengajuan").min = today;
                </script>


                <div class="col-12">
                    <label for="alasan_pengajuan" class="form-label">Alasan Pengajuan<span style="color: red;">*</span></label>
                    <textarea class="form-control" id="alasan_pengajuan" name="alasan_pengajuan" required=""
                        oninvalid="this.setCustomValidity('Alasan Pengajuan Wajib Diisi!')"
                        oninput="this.setCustomValidity('')"
                        style="border-width: 2px; border-style: solid; border-color: #ccc;"></textarea>
                </div>
                <br />

                <div class="col-12" style="display: none;">
                    <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                    <input type="textarea" class="form-control" id="status" name="status" value='Diajukan' readonly>
                </div>

                <br>
                <div class="form-group row text-right">
                        <div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-sm ml-2">
                        <i class="fas fa-save"></i> Ajukan
                    </button>
                    <button type="button" onclick="window.history.back();" class="btn btn-danger btn-sm">
                        <i class="fas fa-times"></i> Batal
                    </button>
                </div>
                </div>
            </form>
        </div>
        </div>
        </div>
</main>
@endsection