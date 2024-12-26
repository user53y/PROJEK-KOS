@extends('layouts.utama')

<link href="template/css/tabel.css" rel="stylesheet">
</head>
<body>
@section('content')
<div class="container1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center" style="color: blanchedalmond">
            <h4 class="fw-bold mb-0 ms-3">Data Pengeluaran, </h4>
            <h4 class="fw-bold mb-0 ms-2" id="jumlahPengeluaran"></h4>
            <h4 class="fw-bold mb-0 ms-2">Pengeluaran</h4>
        </div>
        <div class="d-flex align-items-center">

            <!-- tambah -->
            <div class="me-3">
                <button class="btn btn-primary me-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addModal">
                    <span>Tambah</span>
                    <i class="fi fi-rr-square-plus ms-2"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table" id="Table">
            <thead>
                <tr>
                    <th>Jenis Pengeluaran</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datapengeluaran as $pengeluaran)
                <tr>
                    <td>{{ $pengeluaran->jenisPengeluaran->nama_pengeluaran }}</td>
                    <td>{{ $pengeluaran->deskripsi_pengeluaran }}</td>
                    <td>Rp. {{ number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.') }}</td>
                    <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                    <td>

                        <button class="btn btn-success action-btn edit-btn rounded-circle" data-id="{{ $pengeluaran->id }}" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fi fi-rr-pencil"></i>
                        </button>
                        <button class="btn btn-danger action-btn delete-btn rounded-circle" data-id="{{ $pengeluaran->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fi fi-ss-trash-xmark"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- tambah -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('tambah-pengeluaran') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @include('pemilik.datapengeluaran.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        @include('pemilik.datapengeluaran.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus pengeluaran ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#Table').DataTable();

    // edit
    $('.edit-btn').click(function() {
        const id = $(this).data('id');
        $.get(`/datapengeluaran/${id}/edit`, function(data) {
            $('#editForm').attr('action', `/datapengeluaran/${id}`);
            $('#editForm select[name="jenis_id"]').val(data.jenis_id);
            $('#editForm input[name="deskripsi_pengeluaran"]').val(data.deskripsi_pengeluaran);
            $('#editForm input[name="jumlah_pengeluaran"]').val(data.jumlah_pengeluaran);
            $('#editForm input[name="tanggal_pengeluaran"]').val(data.tanggal_pengeluaran);

            $('#editModal').modal('show');
        });
    });

    // hapus
    $('.delete-btn').click(function() {
        const id = $(this).data('id');
        $('#deleteModal form').attr('action', `/datapengeluaran/${id}`);
        $('#deleteModal').modal('show');
    });
});

function hitungJumlahPengeluaran() {
    const table = $('#Table').DataTable();
    const data = table.data();
    let jumlahPengeluaran = data.length;

    $('#jumlahPengeluaran').text(jumlahPengeluaran);
}

$(document).ready(function () {
    const table = $('#Table').DataTable();
    hitungJumlahPengeluaran();

});
</script>
</body>
</html>
@endsection
