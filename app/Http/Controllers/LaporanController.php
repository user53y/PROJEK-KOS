<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapemasukan;
use App\Models\Datapengeluaran;

class LaporanController extends Controller
{

    public function index()
    {
        return view('pemilik.laporan.index'); // Pastikan view ini sesuai dengan lokasi file Blade Anda
    }


    public function cetak(Request $request)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'bulan' => 'nullable|numeric|min:1|max:12',
        ]);

        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // Ambil data pemasukan dan pengeluaran
        $queryPemasukan = Datapemasukan::whereYear('tanggal', $tahun);
        $queryPengeluaran = Datapengeluaran::whereYear('tanggal_pengeluaran', $tahun);

        if ($bulan) {
            $queryPemasukan->whereMonth('tanggal', $bulan);
            $queryPengeluaran->whereMonth('tanggal_pengeluaran', $bulan);
        }

        $pemasukan = $queryPemasukan->sum('jumlah');
        $pengeluaran = $queryPengeluaran->sum('jumlah_pengeluaran');

        $laba = $pemasukan - $pengeluaran;

        // Generate laporan
        $data = [
            'tahun' => $tahun,
            'bulan' => $bulan,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'laba' => $laba,
        ];

        return view('pemilik.laporan.cetak', $data);
    }
}
