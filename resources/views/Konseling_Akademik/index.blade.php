@extends('layouts.layoutProdi')

@section('title', 'Menu Ajukan')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Pengajuan Konseling - Ajukan Konseling</h6>
</section>
<br/>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">
                    <h6 class="card-title">Data Mahasiswa</h6>
                    <hr />
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ajukans as $ajukan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ajukan->nim }}</td>
                                    <td>{{ $ajukan->nama_mahasiswa }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm text-white"
                                            onclick="pilihMahasiswa('{{ $ajukan->id }}', '{{ $ajukan->nama_mahasiswa }}')">
                                            <i class="fas fa-check"></i> Pilih
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-5">
                            <h6 class="card-title">Mahasiswa Yang Dipilih</h6>
                            <hr />
                            <table class="table table-striped" id="tabelMahasiswaDipilih">
                                <!-- The selected students table will appear here -->
                            </table>

                            <hr/>
                            <div class="mb-3 d-flex justify-content-end">
                                <button class="btn btn-sm btn-success me-2" onclick="ajukanKonseling()" style="margin-right: 10px;">
                                    <i class="fas fa-paper-plane text-white"></i> Kirim Pengajuan
                                </button>
                                <button class="btn btn-primary btn-sm btn-danger ms-2" onclick="batalPengajuan()">
                                    <i class="fas fa-times"></i> Batal
                                </button>
                            </div>
                        </div>
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

    function pilihMahasiswa(nim, namaMahasiswa) {
        var tabelMahasiswaDipilih = document.getElementById('tabelMahasiswaDipilih');

        var isMahasiswaAlreadySelected = Array.from(tabelMahasiswaDipilih.children).some(function (row) {
            var nimCell = row.querySelector('.col-nim');
            return nimCell && nimCell.textContent.trim() === nim.trim();
        });

        if (isMahasiswaAlreadySelected) {
            alert("Mahasiswa sudah dipilih sebelumnya.");
            return;
        }



        if (tabelMahasiswaDipilih.children.length === 0) {
            // Create header row
            var headerRow = document.createElement('tr');
            headerRow.className = 'header-row bg-warning text-white';

            // Add header for NIM
            var headerNimCell = document.createElement('th');
            headerNimCell.className = 'col-nim';
            headerNimCell.textContent = 'NIM';

            // Add header for Nama Mahasiswa
            var headerNamaMahasiswaCell = document.createElement('th');
            headerNamaMahasiswaCell.className = 'col-nama-mahasiswa';
            headerNamaMahasiswaCell.textContent = 'Nama Mahasiswa';

            // Add header for Alasan Pengajuan
            var headerAlasanCell = document.createElement('th');
            headerAlasanCell.className = 'col-alasan';
            headerAlasanCell.textContent = 'Alasan Pengajuan';

            // Add header for the Delete button
            var headerAksiCell = document.createElement('th');
            headerAksiCell.className = 'col-aksi text-center';
            headerAksiCell.textContent = 'Aksi';


            headerRow.appendChild(headerNimCell);
            headerRow.appendChild(headerNamaMahasiswaCell);
            headerRow.appendChild(headerAlasanCell);
            headerRow.appendChild(headerAksiCell);

            tabelMahasiswaDipilih.appendChild(headerRow);
        }

        // Create a new row
        var newRow = document.createElement('tr');

        // Add column for NIM
        var nimCell = document.createElement('td');
        nimCell.className = 'col-nim';
        nimCell.textContent = nim;

        // Add column for Nama Mahasiswa
        var namaMahasiswaCell = document.createElement('td');
        namaMahasiswaCell.className = 'col-nama-mahasiswa';
        namaMahasiswaCell.textContent = namaMahasiswa;

        // Add column for Alasan Pengajuan
        var alasanCell = document.createElement('td');
        alasanCell.className = 'col-alasan';
        var textarea = document.createElement('textarea');
        textarea.className = 'form-control';
        textarea.placeholder = 'Masukkan Alasan Pengajuan';
        alasanCell.appendChild(textarea);

        // Add column for the Delete button
        var aksiCell = document.createElement('td');
        aksiCell.className = 'col-aksi text-center';
        aksiCell.innerHTML = '<button class="btn btn-sm btn-danger" onclick="hapusData(this)"><i class="fas fa-times"></i> Hapus </button>';

        // Add all column elements to the row
        newRow.appendChild(nimCell);
        newRow.appendChild(namaMahasiswaCell);
        newRow.appendChild(alasanCell);
        newRow.appendChild(aksiCell);

        // Add the row to the selected students table
        tabelMahasiswaDipilih.appendChild(newRow);
    }

    function hapusData(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function kirimPengajuan() {
        // Implement logic for sending the submission
        alert("Pengajuan berhasil dikirim!");
        // You may want to reset the selected students table here
        document.getElementById('tabelMahasiswaDipilih').innerHTML = '';
    }

    function batalPengajuan() {
        document.getElementById('tabelMahasiswaDipilih').innerHTML = '';
    }


    function ajukanKonseling() {
    var mahasiswaList = [];
    var rows = document.getElementById('tabelMahasiswaDipilih').children;

    Array.from(rows).slice(1).forEach(function (row) {
        var cells = row.children;
        var id = cells[0].textContent;
        var alasan = cells[2].querySelector('textarea').value;

        // Validasi alasan tidak boleh kosong
        if (alasan.trim() !== '') {
            mahasiswaList.push({ id: id, alasan: alasan });
        } else {
            alert('Alasan pengajuan tidak boleh kosong.');
            return; // Keluar dari fungsi jika ada alasan kosong
        }
    });

    if (mahasiswaList.length > 0) {
        console.log(mahasiswaList);

        $.ajax({
            url: "/Konsling_Akademik/ajukan",
            type: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({ mahasiswaList: mahasiswaList }),
            dataType: "json",
            success: function(data) {
                if (data.success) {
                    alert(data.message);
                    window.location.href = '/Konsling_Akademik/Index';
                } else {
                    alert("Terjadi kesalahan: " + data.message);
                }
            },
            error: function(error) {
                console.error("Kesalahan selama AJAX:", error);
                alert("Terjadi kesalahan saat mengajukan konseling. Silakan coba lagi nanti.");
            }
        });
    } else {
        console.error("Data mahasiswa tidak tersedia atau kosong.");
        alert("Data mahasiswa tidak tersedia atau kosong.");
    }
}

</script>
@endsection
