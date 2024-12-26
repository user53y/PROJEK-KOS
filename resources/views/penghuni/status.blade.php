@extends('layouts.penghuni')
@section('content')
@section('title', 'Cek Status Pemesanan')

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
        .upload-container {
            margin-top: 20px;
        }
        .upload-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .upload-btn:hover {
            background-color: #0056b3;
        }
        input[type="file"] {
            margin-top: 10px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 80%;
        }
        h2 {
            margin-top: 50px;
            color: rgb(0, 0, 0);
            text-align: center;
            font-size: small;
            font-weight: lighter;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CEK STATUS PEMESANAN</h1>
        <div class="content-wrapper">
            <!-- Gambar -->
            <div class="image-container">
                <img src="{{ asset('template/img/penghuni1.png') }}" alt="gambar">
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
                    <td>Bukti Pembayaran</td>
                    <td>
                        <form action="{{ route('upload-payment-proof', $penghuni->id ?? 0) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="paymentProof" name="paymentProof" required>
                            <button type="submit" class="upload-btn">Unggah Bukti Pembayaran</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
@endsection
