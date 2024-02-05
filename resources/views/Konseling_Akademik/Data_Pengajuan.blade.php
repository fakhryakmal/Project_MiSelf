@extends('layouts.layoutProdi')

@section('title','Catatan Konseling')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Pengajuan Konseling - Data Pengajuan</h6>
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
                        <th scope="col" style="text-align: center;">Nama Mahasiswa</th>
                        <th scope="col" style="text-align: center;">Tanggal Pengajuan</th>
                        <th scope="col" style="text-align: center;">Status</th>
                        <th scope="col" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akademik as $akademik)
                        <tr>
                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                            <td style="text-align: center;">KSL-{{ $akademik->id_konseling }}</td>
                            <td style="text-align: center;">{{ $akademik->nama_mahasiswa }}</td>
                            <td style="text-align: center;">{{ date('d-m-Y', strtotime($akademik->tanggal_pengajuan)) }}</td>
                            <td style="text-align: center;">{{ $akademik->status }}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#infoModal_{{ $akademik->id_konseling }}">
                                    <i class="fas fa-map-marker-alt" style="color: white;"></i>  Tracking
                                </button>

                                <div class="modal fade" id="infoModal_{{ $akademik->id_konseling }}" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tracking Konseling</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table" style="text-align: left;">
                                                    <tr>
                                                        <th style="font-weight: normal;">Id Konseling</th>
                                                        <td>KSL-{{ $akademik->id_konseling }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Jenis Konseling</th>
                                                        <td>{{ $akademik->jenis_konseling }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight: normal;">Tanggal Pengajuan</th>
                                                        <td>{{ date('d-m-Y', strtotime($akademik->tanggal_pengajuan)) }}</td>

                                                    </tr>
                                                </table>
                                                <div class="progress mt-3">
                                                    <div id="progressBar_{{ $akademik->id_konseling }}" class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 25px;"></div>
                                                </div>

                                                @php
                                                    $status = $akademik->status;
                                                    $progressBarId = "progressBar_" . $akademik->id_konseling;
                                                @endphp

                                                <script>
                                                    @php
                                                        $status = $akademik->status;
                                                        $progressBarId = "progressBar_" . $akademik->id_konseling;
                                                    @endphp

                                                    var status = "{{ $status }}";
                                                    var progressBar = document.getElementById("{{ $progressBarId }}");

                                                    function setProgressBarWidth(progressBar, percentage) {
                                                        progressBar.style.width = percentage;
                                                        progressBar.style.backgroundColor = "green";
                                                        var percentText = document.createElement("span");
                                                        percentText.classList.add("progress-percent");
                                                        percentText.textContent = percentage;
                                                        progressBar.appendChild(percentText);
                                                    }

                                                    switch (status) {
                                                        case "Diajukan":
                                                            setProgressBarWidth(progressBar, "17%");
                                                            break;
                                                        case "Dikonfirmasi":
                                                            setProgressBarWidth(progressBar, "34%");
                                                            break;
                                                        case "Terjadwal":
                                                            setProgressBarWidth(progressBar, "51%");
                                                            break;
                                                        case "Pelaksanaan":
                                                            setProgressBarWidth(progressBar, "68%");
                                                            break;
                                                        case "Tunggu Hasil":
                                                            setProgressBarWidth(progressBar, "85%");
                                                            break;
                                                        case "Selesai":
                                                            setProgressBarWidth(progressBar, "100%");
                                                            break;
                                                        default:
                                                            setProgressBarWidth(progressBar, "0%");
                                                    }
                                                </script>


                                            </div>

                                            <div class="modal-footer">
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
</script>
@endsection