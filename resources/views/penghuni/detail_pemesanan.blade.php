<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: rgba(19, 60, 48, 0.52);
        }
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid rgb(69, 236, 222);
            background-color: #f0f0f0;
            box-shadow: 3px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #070707;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }
        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        .image-container {
            flex: 1;
            min-width: 200px;
        }
        .image-container img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .image-container img:hover {
            transform: scale(1.2);
        }
        table {
            flex: 2;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table td:first-child {
            font-weight: bold;
            width: 30%;
        }
        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">StayKost.Id</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('kamar-tersedia') }}">Pesan Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('cek-pembayaran') }}">Cek Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Detail Pemesanan</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="content-wrapper">
            <!-- Gambar -->
            <div class="image-container">
                <img src="{{ asset('images/' . $penghuni->datakamar->gambar) }}" alt="Gambar Kamar">
            </div>
            <!-- Tabel -->
            <table>
                <tr>
                    <td>Nama</td>
                    <td>{{ $penghuni->user->name ?? 'Data tidak tersedia' }}</td>
                </tr>
                <tr>
                    <td>Kamar yang dipesan</td>
                    <td>{{ $penghuni->datakamar->no_kamar ?? 'Belum melakukan pemesanan' }}</td>
                </tr>
                <tr>
                    <td>Tanggal pemesanan</td>
                    <td>{{ $penghuni->tanggal_masuk ?? 'Belum melakukan pemesanan' }}</td>
                </tr>
                <tr>
                    <td>Status Pemesanan</td>
                    <td>{{ $penghuni->status ?? 'Belum melakukan pemesanan' }}</td>
                </tr>
                <tr>
                    <td>Harga Bulanan</td>
                    <td>Rp {{ number_format($penghuni->datakamar->harga_bulanan, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        <a href="{{ route('cek-pembayaran') }}" class="btn">Pembayaran</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
