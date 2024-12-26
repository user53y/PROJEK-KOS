@extends('layouts.utama')

<link href="template/css/tabel.css" rel="stylesheet">
</head>
<body>
@section('content')
<div class="container1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center" style="color: blanchedalmond">
            <h4 class="fw-bold mb-0 ms-3">Data Pemasukan, </h4>
            <h4 class="fw-bold mb-0 ms-2" id="jumlahPemasukan"></h4>
            <h4 class="fw-bold mb-0 ms-2">Pemasukan</h4>
        </div>
    </div>

    <div class="container">
        <table class="table" id="Table">
            <thead>
                <tr>
                    <th>Penghuni</th>>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datapemasukan as $pemasukan)
                <tr>
                    <td>{{ $pemasukan->penghuni_id}}</td>
                    <td>Rp. {{ number_format($pemasukan->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $pemasukan->tanggal }}</td>
                    <td>
                        <button class="btn btn-danger action-btn delete-btn rounded-circle" data-id="{{ $pemasukan->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fi fi-ss-trash-xmark"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <!-- hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Pemasukan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus pemasukan ini?</p>
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

    // hapus
    $('.delete-btn').click(function() {
        const id = $(this).data('id');
        $('#deleteModal form').attr('action', `/datapemasukan/${id}`);
        $('#deleteModal').modal('show');
    });
});

function hitungJumlahPemasukan() {
    const table = $('#Table').DataTable();
    const data = table.data();
    let jumlahPemasukan = data.length;

    $('#jumlahPemasukan').text(jumlahPemasukan);
}

$(document).ready(function () {
    const table = $('#Table').DataTable();
    hitungJumlahPemasukan();

});
</script>
</body>
</html>
@endsection
