@extends('layouts.layoutDKA')

@section('title','Data Prodi')

@section('contents')

<section class="section" style="border-bottom: 1px solid #ccc;">
    <h6><span style="color: blue;">MI-SELF</span> / Data Prodi</h6>
</section>
<br />

<section class="section">
    <a href="{{ route('Prodi.create') }}" class="btn btn-sm btn-primary btn-sm">
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
                    <th scope="col">Nama Prodi</th>
                    <th scope="col">Nama Sekretaris Prodi</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama Akun</th>
                    <th scope="col" style="text-align: center;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($prodis as $prodi)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td>{{ $prodi->nama_prodi }}</td>
                        <td>{{ $prodi->nama_sekprod }}</td>
                        <td>{{ $prodi->nomor_hp }}</td>
                        <td>{{ $prodi->email }}</td>
                        <td>{{ $prodi->username }}</td>
                        <td style="text-align: center;">
                        <div class="d-flex justify-content-end mb-2">
                            <form action="{{ route('Prodi.destroy', $prodi->id_prodi) }}" method="post" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mr-2 delete-button" data-id="{{ $prodi->id_prodi }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                            
                            <a href="{{ route('Prodi.edit', $prodi->id_prodi) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Perbarui
                            </a>
                        </div>

                        <div id="delete-message-{{ $prodi->id_prodi }}"></div>

                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

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


    $(document).ready(function () {
        $('.delete-button').on('click', function () {
            var id = $(this).data('id');
            
            // Kirim request delete
            $.ajax({
                url: '/Prodi/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Tampilkan pesan di sini
                    $('#delete-message-' + id).html('<div class="alert alert-success">Data Berhasil Dihapus</div>');
                    
                    // Atau gunakan metode lain sesuai kebutuhan tampilan Anda
                },
                error: function (error) {
                    console.error('Terjadi kesalahan:', error);
                    // Tampilkan pesan error jika diperlukan
                }
            });
        });
    });
</script>

@endsection