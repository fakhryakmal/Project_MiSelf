@extends('layouts.layoutMahasiswa')

@section('title','Catatan Konseling')

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
                        <th scope="col" style="text-align: center;">Tanggal Pengajuan</th>
                        <th scope="col" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayat as $riwayat)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">KSL-{{ $riwayat->id_konseling }}</td>
                            <td style="text-align: center;">{{ $riwayat->jenis_konseling }}</td>
                            <td style="text-align: center;">{{ $riwayat->tanggal_pengajuan }}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#infoModal_{{ $riwayat->id_konseling }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>

                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#feedbackModal_{{ $riwayat->id_konseling }}">
                                    <i class="fas fa-comment"></i> Berikan Feedback
                                </button>

                                <div class="modal fade" id="infoModal_{{ $riwayat->id_konseling }}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Riwayat</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table" style="text-align: left;">
                                                    <tr>
                                                        <th style="font-weight: normal;">Id Konseling</th>
                                                        <td>KSL-{{ $riwayat->id_konseling }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Jenis Konseling</th>
                                                        <td>{{ $riwayat->jenis_konseling }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Tanggal Pengajuan</th>
                                                        <td>{{ $riwayat->tanggal_pengajuan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Alasan</th>
                                                        <td>{{ $riwayat->alasan_pengajuan }}</td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                                    <i class="fas fa-times"></i> Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="feedbackModal_{{ $riwayat->id_konseling }}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Feedback Konseling</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <tr>
                                                        <th style="vertical-align: middle; font-weight: normal;">Feedback Konseling</th>
                                                        <td>
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="Feedback_Konseling_{{ $riwayat->id_konseling }}" placeholder="Masukkan feedback di sini" rows="3"></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-success kirim-button" data-id="{{ $riwayat->id_konseling }}">
                                                    <i class="fas fa-paper-plane"></i> Kirim 
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                                    <i class="fas fa-times"></i> Tutup
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


    $(document).ready(function () {
        $(".kirim-button").click(function () {
            var konselingID = $(this).data("id");
            var feedback = $("#Feedback_Konseling_" + konselingID).val();

            if (feedback) {
                swal({
                    title: "Kirim Feedbackk??",
                    text: "Apakah Anda yakin untuk mengirim feedback?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                }).then((willReschedule) => {
                    if (willReschedule) {
                        // Mengirimkan permintaan feedback ke server
                        $.ajax({
                            url: "/Riwayat/Kirim_Feedback/",
                            type: "POST",
                            data: {
                                id: konselingID,
                                feedback: feedback,
                                _token: $('meta[name="csrf-token"]').attr('content'),
                            },
                            dataType: "json", 
                            success: function (data) {
                                if (data.success) {
                                    swal("Sukses!", data.message, "success");
                                    location.reload();
                                } else {
                                    swal("Gagal!", data.message, "error");
                                }
                            },
                            error: function (xhr, status, error) {
                                // Tampilkan detail kesalahan pada konsol browser
                                console.error("Error:", xhr.responseText);
                                swal("Error!", "Terjadi kesalahan saat mengirim feedback.", "error");
                            }
                        });

                    }
                });
            } else {
                swal("Perhatian!", "Data tidak boleh kosong.", "warning");
            }
        });
    });
</script>
@endsection