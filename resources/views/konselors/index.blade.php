@extends('layouts.layoutDKA')

@section('title','Menu Konselor')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Data Konselor</h6>
</section>
<br />

<section class="section">
<a href="{{ route('konselors.create') }}" class="btn btn-sm btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
        <br />
        <br />

    <div class="row">
        <div class="col-lg-12">
            <table id="myTable" class="table">
            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center;">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col" style="text-align: center;">Pendidikan Terakhir</th>
                                    <th scope="col">Pengalaman</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col" style="text-align: center;">Pas Foto</th>
                                    <th scope="col" style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konselors as $konselor)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <!-- <td>{{ $konselor->id }}</td> -->
                                    <td>{{ $konselor->nama_konselor }}</td>
                                    <td>{{ $konselor->email }}</td>
                                    <td>{{ $konselor->nomor_hp }}</td>
                                    <td style="text-align: center;">{{ $konselor->pendidikan_terakhir }}</td>
                                    <td>{{ $konselor->pengalaman }}</td>
                                    <td>{{ $konselor->alamat }}</td>
                                    <td style="text-align: center;">
                                        <img src="{{ asset($konselor->foto) }}" alt="Foto" class="img-thumbnail"
                                            style="width: 50px; height: 50px;">
                                    </td> 
                                    <td style="text-align: center;">
                                        <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 10px;">
                                            <form action="{{ route('konselors.destroy', $konselor->id_konselor) }}" method="post" style="display: inline-block;" onsubmit="return confirmDelete(event, {{ $konselor->id_konselor }});">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger delete-button" data-id="{{ $konselor->id_konselor }}">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                            <a href="{{ route('konselors.edit', $konselor->id_konselor) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Perbarui
                                            </a>
                                        </div>
                                        <div id="delete-message-{{ $konselor->id_konselor }}"></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#myTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [10, 25, 50, 75, 100],
            "searching": true,
            "ordering": true,
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


    function confirmDelete(event, konselorId) {
        event.preventDefault();
        if (confirm('Yakin ingin menghapus data?')) {
            // Jika user mengonfirmasi, lanjutkan dengan penghapusan
            document.getElementById('delete-message-' + konselorId).innerHTML = '<p>Data Berhasil Dihapus</p>';
            event.target.submit();
        } else {
            // Jika user membatalkan, tampilkan pesan pembatalan
            document.getElementById('delete-message-' + konselorId).innerHTML = '<p>Penghapusan Dibatalkan</p>';
        }
    }

</script>
@endsection