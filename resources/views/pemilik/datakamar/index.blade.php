@extends('layouts.utama')
<link href= template/css/tabel.css rel="stylesheet">
</head>
<body>
@section('content')
<div class="container1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center" style="color: blanchedalmond">
            <h4 class="fw-bold mb-0 ms-3">Kamar yang tersedia, </h4>
            <h4 class="fw-bold mb-0 ms-2" id="jumlahTersedia"></h4>
            <h4 class="fw-bold mb-0 ms-2">Kamar</h4>
        </div>

        <div class="d-flex align-items-center">
            <div class="me-3">
                <div class="input-group" style="width: 150px;">
                    <span class="input-group-text text-black">
                        <i class="fi fi-rr-filter"></i>
                    </span>
                    <select id="statusFilter" class="form-select">
                        <option value="all">Semua</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Disewa">Disewa</option>
                    </select>
                </div>
            </div>


            <!-- Ekspor PDF -->
            <div class="me-3">
                <a href = "{{ route('kamar.pdf') }}" button class="btn btn-danger rounded" id="exportPdf" title="Ekspor ke PDF">
                    <i class="fi fi-ss-file-pdf"></i>
                </a>
            </div>
            <!-- Ekspor Excel -->
            <div class="me-3">
                <a href = "{{ route('kamar.excel') }}" button class="btn btn-success rounded" id="exportExcel" title="Ekspor ke Excel">
                    <i class="fi fi-ss-file-excel"></i>
                </a>
            </div>

            <!--  Tambah -->
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
                <th>No. Kamar</th>
                <th>Tipe</th>
                <th>Luas</th>
                <th>Lantai</th>
                <th>Kapasitas</th>
                <th>Harga Bulanan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datakamar as $room)
            <tr>
                <td>{{ $room->no_kamar }}</td>
                <td>{{ $room->tipe }}</td>
                <td>{{ $room->luas }}</td>
                <td>{{ $room->lantai }}</td>
                <td>{{ $room->kapasitas }} orang</td>

                <td>Rp. {{ number_format($room->harga_bulanan, 0, ',', '.') }}</td>
                <td>
                    <span class="badge rounded-pill
                    {{ $room->status == 'Tersedia' ? 'bg-success' : 'bg-danger' }}">
                    {{ $room->status }}
                    </span>
                </td>
                <td>
                    <button class="btn btn-info view-btn rounded-circle" data-id="{{ $room->id }}" data-bs-toggle="modal" data-bs-target="#viewModal">
                        <i class="fi fi-ss-eye" style="color: white"></i>
                    </button>
                    <button class="btn btn-success action-btn edit-btn rounded-circle" data-id="{{ $room->id }}" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fi fi-rr-pencil"></i>
                    </button>
                    <button class="btn btn-danger action-btn delete-btn rounded-circle" data-id="{{ $room->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                <h5 class="modal-title">Tambah Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('tambah-kamar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @include('pemilik.datakamar.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <div class="me-3">
                        <button class="btn btn-primary me-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addModal">
                            <span>Simpan </span>
                            <i class="fi fi-ss-disk ms-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    @include('pemilik.datakamar.form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <div class="me-3">
                        <button class="btn btn-primary me-2 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#addModal">
                            <span>Update</span>
                            <i class="fi fi-ss-disk ms-2"></i>
                        </button>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>



<!-- lihat -->
<div class="modal fade" id="viewModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="viewDetails"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Kamar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus kamar ini?</p>
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

    //edit
    $('.edit-btn').click(function() {
        const id = $(this).data('id');
        $.get(`/datakamar/${id}/edit`, function(data) {
            $('#editForm').attr('action', `/datakamar/${id}`);
            $('#editForm input[name="no_kamar"]').val(data.no_kamar);
            $('#editForm input[name="tipe"]').val(data.tipe);
            $('#editForm input[name="luas"]').val(data.luas);
            $('#editForm input[name="lantai"]').val(data.lantai);
            $('#editForm input[name="kapasitas"]').val(data.kapasitas);
            $('#editForm input[name="harga_bulanan"]').val(data.harga_bulanan);
            $('#editForm select[name="status"]').val(data.status);
            $('#editForm input[name="gambar"]').val(data.gambar);

            $('#editModal').modal('show');

        });
    });

    //lihat
    $('.view-btn').click(function() {
        const id = $(this).data('id');
        $.get(`/datakamar/${id}`, function(data) {
            let html = `
                @include('pemilik.datakamar.view')
            `;
            $('#viewDetails').html(html);
        });
    });

    //hapus
    $('.delete-btn').click(function() {
        const id = $(this).data('id');
        $('#deleteModal form').attr('action', `/datakamar/${id}`);
        $('#deleteModal').modal('hide');
    });

});

function hitungJumlahTersedia() {
    const table = $('#Table').DataTable();
    const data = table.data();
    let jumlahTersedia = 0;

    data.each(function (row) {
        if (row[6].includes('Tersedia')) {
            jumlahTersedia++;
        }
    });

    $('#jumlahTersedia').text(jumlahTersedia);
}

$(document).ready(function () {
    const table = $('#Table').DataTable();
    hitungJumlahTersedia();

    // Filter berdasarkan status
    $('#statusFilter').on('change', function () {
        const status = $(this).val();
        if (status === 'all') {
            table.columns(6).search('').draw();
        } else {
            table.columns(6).search(status).draw();
        }
    });
});

</script>
</body>
</html>
@endsection


