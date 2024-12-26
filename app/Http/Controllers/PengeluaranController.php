<?php

namespace App\Http\Controllers;

use App\Models\DataPengeluaran;
use App\Models\JenisPengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $datapengeluaran = DataPengeluaran::all();
        $jenisPengeluaran = JenisPengeluaran::all();
        return view('pemilik.datapengeluaran.index', compact('datapengeluaran', 'jenisPengeluaran'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_id' => 'required|exists:jenispengeluaran,id',
            'deskripsi_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        DataPengeluaran::create($validated);
        return redirect()->route('tampil-pengeluaran')->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function edit($id)
    {
        $datapengeluaran = DataPengeluaran::findOrFail($id);
        return response()->json($datapengeluaran);
    }

    public function update(Request $request, $id)
    {
        $datapengeluaran = DataPengeluaran::findOrFail($id);

        $validated = $request->validate([
            'jenis_id' => 'required|exists:jenispengeluaran,id',
            'deskripsi_pengeluaran' => 'required',
            'jumlah_pengeluaran' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date',
        ]);

        $datapengeluaran->update($validated);
        return redirect()->route('tampil-pengeluaran')->with('success', 'Pengeluaran berhasil diperbarui');
    }

    public function show($id)
    {
        $datapengeluaran = DataPengeluaran::findOrFail($id);
        return response()->json($datapengeluaran);
    }

    public function destroy(DataPengeluaran $datapengeluaran)
    {
        $datapengeluaran->delete();
        return redirect()->route('tampil-pengeluaran')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
