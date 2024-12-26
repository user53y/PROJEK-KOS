<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title id="tittle">Laporan Laba Rugi</title>
    <style type="text/css">
    .style1 {
      font-size: large;
    }

    body {
      max-height: 500px;
    }
  </style>
    <title>Laporan Laba</title>
</head>
<body>
<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr height="20px"></tr>
    <tr>
      <td width="100%" colspan="4">
        <div align="center" class="style1"><strong>KOST PUTRI BU TIK</strong><br>
        Jl. Margo Tani, Sukorame, Kec. Mojoroto, Kota Kediri, Jawa Timur 64114, Telp 085815320313 Jawa Timur<br>
          Website : staykost.com E-Mail : kostputributik@gmail.com </div>
      </td>
    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td colspan="4">
        <hr noshade>
      </td>
    </tr>
    <tr>
      <td colspan="4" align="center">
        <strong class="style1">LAPORAN LABA</strong>
      </td>
    </tr>
    <tr>
      <td colspan="4" align="center">
        <strong class="style1">{{ $bulan ? date('F', mktime(0, 0, 0, $bulan, 1)) : 'Seluruh Tahun' }} {{ $tahun }}</strong>
      </td>
    </tr>
    <tr height="20px">
      <td width="25%">

      </td>
      <td width="25%">
      </td>
      <td width="25%" colspan="2"></td>
    </tr>
    <tr>
      <td width="25%">

      </td>
      <td width="25%">          </td>
      <td width="25%" colspan="2"><strong>TANGGAL CETAK: {{ date('d F Y') }}</strong></td>
    </tr>
    <tr height="30px">
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">
      <td width="25%"><strong>PERIODE</strong></td>
      <td width="25%" align="left">: {{ $bulan ? date('F', mktime(0, 0, 0, $bulan, 1)) : 'Seluruh Tahun' }} {{ $tahun }}</td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">
      <td width="25%"><strong>TOTAL PEMASUKAN</strong></td>
      <td width="25%" align="left">: Rp. {{ number_format($pemasukan ?? 0, 0, ',', '.') }}</td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">
      <td width="25%"><strong>TOTAL PENGELUARAN</strong></td>
      <td width="25%" align="left">: Rp. {{ number_format($pengeluaran ?? 0, 0, ',', '.') }}</td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">
      <td width="25%"><strong>LABA</strong></td>
      <td width="25%" align="left">: Rp. {{ number_format($laba ?? 0, 0, ',', '.') }}</td>
      <td width="25%"></td>
      <td width="25%"></td>
    </tr>
    <tr height="30px">
      <td width="26%"></td>
      <td width="74%" colspan="3"></td>
    </tr>
    <tr height="30px">
      <td align="center">
        <button name="cetak" type="button" id="cetak" value="Cetak" onClick="printReport()">Cetak</button>
        <button name="kembali" type="button" id="kembali" value="Kembali" onClick="kembaliKeIndex()">Kembali</button>
      </td>
      <td ></td>
      <td colspan="2"></td>
    </tr>
  </table>

    <tr>
      <td colspan="4"></td>
    </tr>
    <tr>
      <td colspan="4">
        <hr noshade>
      </td>
    </tr>
<script>
        function printReport() {
            document.getElementById('cetak').style.display = 'none';
            document.getElementById('kembali').style.display = 'none';

            // Cetak halaman
            window.print();
            document.getElementById('cetak').style.display = 'inline';
            document.getElementById('kembali').style.display = 'inline';
        }
        function kembaliKeIndex() {
            window.location.href = '{{ route("laporan.index") }}';
        }
    </script>
</body>
</html>
