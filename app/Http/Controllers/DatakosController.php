<?php

namespace App\Http\Controllers;

use App\Models\Datakos;
use Illuminate\Http\Request;

class DatakosController extends Controller
{
    public function index()
    {
        $data_kost = Datakos::all();
        return view('pemilik.dashboard', compact('data_kost'));
    }
    public function edit($id) {
        $data_kost = DataKos::findOrFail($id);
        return response()->json($data_kost);
    }

    public function show($id) {
        $data_kost = Datakos::findOrFail($id);
        return response()->json($data_kost);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kost' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jumlah_kamar' => 'required|integer|min:1',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        $kost = DataKos::find($id);
        if (!$kost) {
            return redirect()->back()->withErrors(['error' => 'Data Kost tidak ditemukan']);        }

        $kost->update($validated);
        return redirect()->route('dashboard')->with('success', 'Data Kost berhasil diperbarui');
    }

}

