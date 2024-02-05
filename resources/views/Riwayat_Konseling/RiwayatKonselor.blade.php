@extends('layouts.layoutKonselor')

@section('title','Jadwal Konseling')

@section('contents')
<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Riwayat Konseling</h6>
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
                        <th scope="col" style="text-align: center;">Tanggal Konseling</th>
                        <th scope="col" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayat as $riwayat)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">KSL-{{ $riwayat->id_konseling }}</td>
                            <td style="text-align: center;">{{ $riwayat->jenis_konseling }}</td>
                            <td>{{ $riwayat->nama_mahasiswa }}</td>
                            <td>{{ $riwayat->nama_prodi }}</td>
                            <td style="text-align: center;">{{ $riwayat->tanggal_konseling }}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#infoModal_{{ $riwayat->id_jadwal }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                                <div class="modal fade" id="infoModal_{{ $riwayat->id_jadwal }}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Jadwal</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table" style="text-align: left;">
                                                    <tr>
                                                        <th style="font-weight: normal;">Id Jadwal</th>
                                                        <td>JDL00{{ $riwayat->id_jadwal }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Jenis Konseling</th>
                                                        <td>{{ $riwayat->jenis_konseling }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Nama Mahasiswa</th>
                                                        <td>{{ $riwayat->nama_mahasiswa }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Prodi</th>
                                                        <td>{{ $riwayat->nama_prodi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Konselor</th>
                                                        <td>{{ $riwayat->nama_konselor }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Tempat</th>
                                                        <td>{{ $riwayat->tempat_konseling }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Tanggal</th>
                                                        <td>{{ $riwayat->tanggal_konseling }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Waktu</th>
                                                        <td>{{ $riwayat->waktu_konseling }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                                    Tutup
                                                    <i class="fas fa-times"></i>
                                                </button>
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