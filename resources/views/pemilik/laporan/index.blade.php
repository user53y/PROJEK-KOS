@extends('layouts.utama')

<link href="template/css/tabel.css" rel="stylesheet">
</head>
<body>
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center">KOST PUTRI BU TIK</h2>
            <h4 class="text-center">INPUT LAPORAN LABA</h4>
            <form action="{{ route('laporan.cetak') }}" method="POST" target="_blank">
                @csrf
                <div class="mb-3">
                    <label for="tahun" class="form-label">Pilih Tahun</label>
                    <select name="tahun" class="form-select" required>
                        <option value="">Pilih Tahun</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bulan" class="form-label">Pilih Bulan (Opsional)</label>
                    <select name="bulan" class="form-select">
                        <option value="">Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cetak Laporan</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
@endsection
