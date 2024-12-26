@extends('layouts.utama')

<link href="template/css/tabel.css" rel="stylesheet">
</head>
<body>
@section('content')
<div class="container1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center" style="color: blanchedalmond">
            <h4 class="fw-bold mb-0 ms-3">Penghuni yang terdaftar, </h4>
            <h4 class="fw-bold mb-0 ms-2" id="jumlahPenghuni"></h4>
            <h4 class="fw-bold mb-0 ms-2">Orang</h4>
        </div>

        <div class="d-flex align-items-center">
            <div class="me-3">
                <div class="input-group" style="width: 150px;">
                    <span class="input-group-text text-black">
                        <i class="fi fi-rr-filter"></i>
                    </span>
                    <select id="statusFilter" class="form-select">
                        <option value="all">Semua</option>
                        <option value="Tersedia">Lunas</option>
                        <option value="Disewa">Belum Lunas</option>
                    </select>
                </div>
            </div>


            <!-- Tombol Ekspor PDF -->
            <div class="me-3">
                <a href = "{{ route('penghuni.pdf') }}" button class="btn btn-danger rounded" id="exportPdf" title="Ekspor ke PDF">
                    <i class="fi fi-ss-file-pdf"></i>
                </a>
            </div>
            <!-- Tombol Ekspor Excel -->
            <div class="me-3">
                <a href = "{{ route('penghuni.excel') }}" button class="btn btn-success rounded" id="exportExcel" title="Ekspor ke Excel">
                    <i class="fi fi-ss-file-excel"></i>
                </a>
            </div>

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
                    <th>No</th>
                    <th>Nama Penghuni</th>
                    <th>No. Kamar</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penghuni as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->datakamar->no_kamar }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y') }}</td>

                    <td>
                        <span class="badge rounded-pill {{ $item->status == 'menghuni' ? 'bg-success' : 'bg-danger' }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-info view-btn rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#viewModal">
                            <i class="fi fi-ss-eye" style="color: white"></i>
                        </button>
                        <button class="btn btn-danger delete-btn rounded-circle" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
                    <h5 class="modal-title">Tambah Penghuni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('tambah-penghuni') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @include('pemilik.datapenghuni.form')
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
                    <h5 class="modal-title">Detail Penghuni</h5>
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
                    <h5 class="modal-title">Hapus Penghuni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data penghuni ini?</p>
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


    // lihat
    $('.view-btn').click(function() {
        const id = $(this).data('id');
        $.get(`/datapenghuni/${id}`, function(data) {
            let html = `
                <div class="d-flex justify-content-center mb-3">
                    <img src="/images/${data.foto_ktp}" alt="Foto KTP" class="img-fluid rounded" />
                </div>
                <table class="table table-borderless">
                    <tbody>
                        <tr><td><strong>Nama Penghuni:</strong></td><td>${data.user.name}</td></tr>
                        <tr><td><strong>No. Kamar:</strong></td><td>${data.datakamar.no_kamar}</td></tr>
                        <tr><td><strong>Tanggal Masuk:</strong></td><td>${data.tanggal_masuk}</td></tr>
                        <tr><td><strong>Tanggal Keluar:</strong></td><td>${data.tanggal_keluar}</td></tr>
                        <tr><td><strong>Status:</strong></td><td>${data.status}</td></tr>
                    </tbody>
                </table>`;
            $('#viewDetails').html(html);
        });
    });


    // hapus
    $('.delete-btn').click(function() {
        const id = $(this).data('id');
        $('#deleteForm').attr('action', `/datapenghuni/${id}`);
        $('#deleteModal').modal('show');
    });


});

$(document).ready(function () {
    const table = $('#Table').DataTable();

    function hitungJumlahTersedia() {
        const penghuniCount = table.rows().count();
        $('#jumlahPenghuni').text(penghuniCount);
    }

    hitungJumlahTersedia();

    table.on('draw', function () {
        hitungJumlahTersedia();
    });
});
</script>
</body>
@endsection
