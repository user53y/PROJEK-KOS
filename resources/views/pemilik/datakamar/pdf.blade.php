<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title id="tittle">Laporan Kamar</title>
    <style type="text/css">
    .style1 {
        font-size: large;
    }

    body {
        max-height: 500px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>
<body>
    <table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="20px"></tr>
        <tr>
            <td width="100%" colspan="4">
                <div align="center" class="style1">
                    <strong>KOST PUTRI BU TIK</strong><br>
                    Jl. Margo Tani, Sukorame, Kec. Mojoroto, Kota Kediri, Jawa Timur 64114, Telp 085815320313<br>
                    Website: indiekost.mif-project.com E-Mail: kostputributik@gmail.com
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4"><hr noshade></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
                <strong class="style1">LAPORAN DATA KAMAR</strong>
            </td>
        </tr>
        <tr height="30px">
            <td width="26%"></td>
            <td width="74%" colspan="3"><strong>TANGGAL CETAK: {{ now()->format('d M Y') }}</strong></td>
        </tr>
    </table>

    <table align="center">
        <thead>
            <tr>
                <th>No. Kamar</th>
                <th>Tipe</th>
                <th>Luas</th>
                <th>Lantai</th>
                <th>Kapasitas</th>
                <th>Harga Bulanan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datakamar as $room)
            <tr>
                <td>{{ $room->no_kamar }}</td>
                <td>{{ $room->tipe }}</td>
                <td>{{ $room->luas }}</td>
                <td>{{ $room->lantai }}</td>
                <td>{{ $room->kapasitas }} orang</td>
                <td>Rp. {{ number_format($room->harga_bulanan, 0, ',', '.') }}</td>
                <td>
                    <span class="{{ $room->status == 'Tersedia' ? 'bg-success' : 'bg-danger' }}">
                        {{ $room->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div align="center" style="margin-top: 20px;">
        <button name="cetak" type="button" id="cetak" value="Cetak" onClick="printReport()">Cetak</button>
        <button name="kembali" type="button" id="kembali" value="Kembali" onClick="kembaliKeIndex()">Kembali</button>
    </div>

    <script>
        function printReport() {
            document.getElementById('cetak').style.display = 'none';
            document.getElementById('kembali').style.display = 'none';

            window.print();

            document.getElementById('cetak').style.display = 'inline';
            document.getElementById('kembali').style.display = 'inline';
        }

        function kembaliKeIndex() {
            window.location.href = '{{ route("datakamar.index") }}';
        }
    </script>
</body>
</html>
