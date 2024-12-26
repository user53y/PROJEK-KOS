<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Bukti Penghuni</title>
    <style type="text/css">
        .style1 {
            font-size: large;
        }
        body {
            max-height: 500px;
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<table align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="4">
            <div align="center" class="style1"><strong>KOST PUTRI BU TIK</strong><br>
                Jl. Margo Tani, Sukorame, Kec. Mojoroto, Kota Kediri, Jawa Timur 64114<br>
                Telp 085815320313 | Website: indiekost.mif-project.com | Email: kostputributik@gmail.com
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="4"><hr></td>
    </tr>
    <tr>
        <td colspan="4" align="center">
            <strong class="style1">BUKTI DATA PENGHUNI</strong>
        </td>
    </tr>
    <tr>
        <td colspan="4" align="center"><strong>Tanggal Cetak: {{ date('d-m-Y') }}</strong></td>
    </tr>
    <tr>
        <td colspan="4"><hr></td>
    </tr>
    <tr>
        <td colspan="4">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penghuni</th>
                        <th>No. Kamar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datapenghuni as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->datakamar->no_kamar }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_keluar)->format('d-m-Y') }}</td>
                            <td>{{ $item->status == 'menghuni' ? 'Menghuni' : 'Tidak Menghuni' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <div align="center">
                <button id="cetak" onclick="printPage()">Cetak</button>
                <button id="kembali" onclick="kembaliKeIndex()">Kembali</button>
            </div>
        </td>
    </tr>
</table>

<script>
    function printPage() {
        document.getElementById('cetak').style.display = 'none';
        document.getElementById('kembali').style.display = 'none';
        window.print();
        document.getElementById('cetak').style.display = 'inline';
        document.getElementById('kembali').style.display = 'inline';
    }

    function kembaliKeIndex() {
        window.location.href = '{{ route("datapenghuni.index") }}'; // Redirect ke halaman index data penghuni
    }
</script>
</body>
</html>
