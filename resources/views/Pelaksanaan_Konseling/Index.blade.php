@extends('layouts.layoutKonselor')

@section('title','Jadwal Konseling')

@section('contents')
<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Pelaksanaan Konseling</h6>
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
                        <th scope="col" style="text-align: center;">Id Jadwal</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col" style="text-align: center;">Tanggal</th>
                        <th scope="col" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelaksanaan as $pelaksanaan)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">KSL-{{ $pelaksanaan->id_konseling }}</td>
                            <td style="text-align: center;">{{ $pelaksanaan->jenis_konseling }}</td>
                            <td style="text-align: center;">JDL-{{ $pelaksanaan->id_jadwal }}</td>
                            <td>{{ $pelaksanaan->nama_mahasiswa }}</td>
                            <td>{{ $pelaksanaan->nama_prodi }}</td>
                            <td>{{ $pelaksanaan->tempat_konseling }}</td>
                            <td style="text-align: center;">{{ $pelaksanaan->tanggal_konseling }}</td>
                            <td style="text-align: center;">

                                <button class="btn btn-sm btn-primary" onclick="selesaikonseling({{ $pelaksanaan->id_jadwal }}, {{ $pelaksanaan->id_konseling }})">
                                    <i class="fas fa-check"></i> Selesai
                                </button>

                                <button class="btn btn-sm btn-warning" onclick="lanjutkonseling({{ $pelaksanaan->id_jadwal }}, {{ $pelaksanaan->id_konseling }})">
                                    <i class="fas fa-arrow-right"></i> Konseling Lanjutan
                                </button>
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

    function selesaikonseling(scheduleId, konselingId) {
        $.ajax({
            url: '/Pelaksanaan_Konseling/selesai/' + scheduleId + '/' + konselingId,
            type: 'PUT',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                if (response.success) {
                    alert('Konseling berhasil diselesaikan');
                    $('#infoModal_' + scheduleId).modal('hide');
                    location.reload();
                } else {
                    alert('Gagal mengkonfirmasi schedule. Silakan coba lagi.');
                }
            },
            error: function (error) {
                console.error('Terjadi kesalahan:', error);
                alert('Gagal mengkonfirmasi schedule. Silakan coba lagi.');
            }
        });
    }

    function lanjutkonseling(scheduleId, konselingId) {
        $.ajax({
            url: '/Pelaksanaan_Konseling/lanjut/' + scheduleId + '/' + konselingId,
            type: 'PUT',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                if (response.success) {
                    alert('Konseling akan dilanjutkan');
                    $('#infoModal_' + scheduleId).modal('hide');
                    location.reload();
                } else {
                    alert('Gagal mengkonfirmasi schedule. Silakan coba lagi.');
                }
            },
            error: function (error) {
                console.error('Terjadi kesalahan:', error);
                alert('Gagal mengkonfirmasi schedule. Silakan coba lagi.');
            }
        });
    }
</script>

@endsection