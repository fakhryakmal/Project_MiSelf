@extends('layouts.layoutDKA')

@section('title','Catatan Konseling')

@section('contents')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">No</th>
                        <th scope="col" style="text-align: center;">Id Konseling</th>
                        <th scope="col" style="text-align: center;">Id Jadwal</th>
                        <th scope="col" style="text-align: center;">Jenis Konseling</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Nama Konselor</th>
                        <th scope="col" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasilakhir as $catatan)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">KSL-{{ $catatan->id_konseling }}</td>
                            <td style="text-align: center;">JDL-{{ $catatan->id_jadwal }}</td>
                            <td style="text-align: center;">{{ $catatan->jenis_konseling }}</td>
                            <td>{{ $catatan->nama_mahasiswa }}</td>
                            <td>{{ $catatan->nama_prodi }}</td>
                            <td>{{ $catatan->nama_konselor }}</td>
                            <td style ="text-align: center;">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#" onclick="openUploadFileModal({{ $catatan->id_jadwal }})">
                                    <i class="fas fa-download"></i> Unduh Catatan
                                </button>

                                <!-- Upload File Modal -->
                                <div id="#" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Upload File</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="#" method="post" action="#" enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- Input file dengan kelas dan atribut data-id -->
                                                    <div class="mb-3">
                                                        <label for="fileInput" class="form-label">Pilih Dokumen</label>
                                                        <input type="file" name="file" class="form-control fileInput w-50" accept=".pdf, .doc, .docx, .png, .jpg" required>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-upload"></i> Unggah
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                                            <i class="fas fa-times"></i> Tutup
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
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
    });
</script>
@endsection