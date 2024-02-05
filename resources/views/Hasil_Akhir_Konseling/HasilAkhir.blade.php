@extends('layouts.layoutDKA')

@section('title', 'Hasil Akhir')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Hasil Konseling</h6>
</section>
<br/>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">No</th>
                        <th scope="col" style="text-align: center;">Id Konseling</th>
                        <th scope="col" style="text-align: center;">Jenis Konseling</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Prodi</th>
                        <th scope="col" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilakhir as $hasil)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">KSL-{{ $hasil->id_konseling }}</td>
                            <td style="text-align: center;">{{ $hasil->jenis_konseling }}</td>
                            <td>{{ $hasil->nama_mahasiswa }}</td>
                            <td>{{ $hasil->nama_prodi }}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#Uploadfile-{{ $hasil->id_konseling }}">
                                    <i class="fas fa-upload"></i> Unggah Hasil
                                </button>

                                <!-- Upload File Modal -->
                                <div id="Uploadfile-{{ $hasil->id_konseling }}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="uploadForm" class="uploadForm" data-id="{{ $hasil->id_konseling }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hasil Akhir</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <input type="file" id="fileInput-{{ $hasil->id_konseling }}" />
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-success" onclick="handleUploadButtonClick({{ $hasil->id_konseling }})">
                                                        <i class="fas fa-save"></i> Simpan
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                                        <i class="fas fa-times"></i> Tutup
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- <script>
                                                function handleUploadButtonClick(id) {
                                                    var id = id;
                                                    var fileInput = $('#fileInput-' + id)[0];
                                                    console.log('ID:', id);
                                                    console.log('ID:', fileInput);
                                                    //uploadFile(id, fileInput);
                                                }
                                            </script> -->

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable
        var table = $('#myTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 75, 100],
            "searching": true,
            "ordering": false,
            "language": {
                "search": "Pencarian",
                "paginate": {
                    "next": "Berikutnya",
                    "previous": "Sebelumnya",
                },
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 Data",
                "infoFiltered": "(disaring dari _MAX_ total Data)",
                "lengthMenu": "Tampilkan _MENU_ Data",
            },
        });

        // Pemanggilan fungsi uploadFile saat formulir di-submit
        $('.uploadForm').submit(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log('ID:', id);
            var fileInput = $('#fileInput-' + id)[0]; // Sesuaikan dengan ID fileInput
            console.log('ID:', fileInput);
            //uploadFile(id, fileInput);
        });
    });

    function handleUploadButtonClick(id) {
        var id = id;
        var fileInput = $('#fileInput-' + id)[0];
        console.log('ID:', id);
        console.log('ID:', fileInput);

        var formData = new FormData();
        formData.append('id_konseling', id);

        if (fileInput && fileInput.files && fileInput.files.length > 0) {
            formData.append('file', fileInput.files[0]);

            $.ajax({
                type: 'POST',
                url: '/Hasil_Akhir_Konseling/save-file', // Sesuaikan dengan URL rute Anda
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response.message);
                    alert("File Berhasil Disimpan.");
                    location.reload();
                },
                error: function (error) {
                    console.error("Error uploading file:", error);

                    var errorMessage = "Error uploading file. Please try again.";
                    if (error.responseJSON && error.responseJSON.message) {
                        errorMessage = error.responseJSON.message;
                    }

                    alert(errorMessage);
                }
            });
        } else {
            console.error("File input is undefined or empty.");
            alert("Data Tidak Boleh Kosong.");
        }
    }
</script>
@endsection
