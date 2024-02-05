@extends('layouts.layoutDKA')

@section('title','Atur Jadwal')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Jadwal Konseling - Atur Jadwal</h6>
</section>
<br/>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Setengah lebar layar untuk formulir -->
            <div class="col-md-6">
                <br />
                <br />
            <form action="{{ route('Penjadwalan_Konseling.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <style>
                #konselorDropdown option[value=""] {
                    display: none;
                }
                </style>

                <input type="hidden" class="form-control" id="id_konseling" name="id_konseling" value="{{ $jadwals->id_konseling }}">

                
                <div class="col-12">
                    <label for="id_konselor" class="form-label">Nama Konselor<span style="color: red;">*</span></label>
                    <select class="form-control" id="konselorDropdown" name="id_konselor"
                    required=""
                    oninvalid="this.setCustomValidity('Konselor Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                        <option value="" disabled selected>Pilih Konselor</option>
                    </select>
                </div>
                <br />

                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $.ajax({
                            url: '/get-konselors',
                            type: 'GET',
                            dataType: 'json',
                            success: function(data){
                                $.each(data, function(key, value){
                                    $('#konselorDropdown').append('<option value="'+ key +'" name="id_konselor">'+ value +'</option>');
                                });
                            }
                        });
                    });
                </script>

                <div class="col-12">
                    <label for="tanggal_konseling" class="form-label">Tanggal Konseling<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" id="tanggal_konseling" name="tanggal_konseling" min="<?php echo date('Y-m-d'); ?>"
                    required=""
                    oninvalid="this.setCustomValidity('Tanggal Konseling Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                </div>
                <br />
                <script>
                    // Mendapatkan elemen input tanggal
                    var tanggalKonselingInput = document.getElementById('tanggal_konseling');

                    // Mengatur nilai default menjadi tanggal saat ini
                    var tanggalSaatIni = new Date();
                    var tahun = tanggalSaatIni.getFullYear();
                    var bulan = (tanggalSaatIni.getMonth() + 1).toString().padStart(2, '0');
                    var tanggal = tanggalSaatIni.getDate().toString().padStart(2, '0');
                    tanggalKonselingInput.value = tahun + '-' + bulan + '-' + tanggal;

                    // Menambahkan event listener untuk memastikan tanggal tidak kurang dari tanggal saat ini
                    tanggalKonselingInput.addEventListener('input', function () {
                        var inputDate = new Date(tanggalKonselingInput.value);
                        var currentDate = new Date();
                        
                        if (inputDate < currentDate) {
                            alert('Tanggal konseling tidak boleh kurang dari tanggal saat ini.');
                            tanggalKonselingInput.value = tahun + '-' + bulan + '-' + tanggal;
                        }
                    });
                </script>

                <div class="col-12">
                    <label for="waktu_konseling" class="form-label">Waktu Konseling<span style="color: red;">*</span></label>
                    <input type="time" class="form-control" id="waktu_konseling" name="waktu_konseling" 
                    required=""
                    oninvalid="this.setCustomValidity('Waktu Konseling Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                </div>
                <br />
                <script>
                    // Mendapatkan elemen input waktu
                    var waktuKonselingInput = document.getElementById('waktu_konseling');
                </script>


                <div class="col-12">
                    <label for="tempat_konseling" class="form-label">Tempat Konseling<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="tempat_konseling" name="tempat_konseling"
                    required=""
                    oninvalid="this.setCustomValidity('Tempat Konseling Wajib Diisi!')"
                    oninput="this.setCustomValidity('')"
                    style="border-width: 2px; border-style: solid; border-color: #ccc;">
                </div>
                <br />
                <div class="col-12" style="display:none;">
                    <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="status" name="status" value="Terjadwal" readonly>
                </div>
                <br />

                <br>
                        <div class="form-group row text-right">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success btn-sm ml-2">
                                    <i class="fas fa-save"></i> Simpan
                                </button>

                                <button type="button" class="btn btn-danger btn-sm" onclick="window.history.back();">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>
</main>
<!-- End - Main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@endsection