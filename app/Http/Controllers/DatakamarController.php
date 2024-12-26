<?php

namespace App\Http\Controllers;

use App\Models\Datakamar;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use App\Exports\KamarExport;
use Maatwebsite\Excel\Facades\Excel;

class DatakamarController extends Controller
{
    public function index()
    {
        $datakamar = Datakamar::all();
        return view('pemilik.datakamar.index', compact('datakamar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kamar' => 'required',
            'tipe' => 'required',
            'luas' => 'required',
            'lantai' => 'required|numeric',
            'kapasitas' => 'required|numeric',
            'harga_bulanan' => 'required|numeric',
            'status' => 'required',
            'gambar'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['gambar'] = $imageName;
        }

        Datakamar::create($validated);
        return redirect()->route('tampil-kamar')->with('success', 'Kamar berhasil ditambahkan');
    }

    public function edit($id) {
        $datakamar = Datakamar::findOrFail($id);
        return response()->json($datakamar);
    }

    public function update(Request $request, $id)
    {
        $datakamar = Datakamar::findOrFail($id);

        $validated = $request->validate([
            'no_kamar' => 'required',
            'tipe' => 'required',
            'luas' => 'required',
            'lantai' => 'required|numeric',
            'kapasitas' => 'required|numeric',
            'harga_bulanan' => 'required|numeric',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validated['gambar'] = $imageName;
        }

        $datakamar->update($validated);

        $datakamar = DataKamar::find($id);
        if (!$datakamar) {
            return redirect()->back()->withErrors(['error' => 'Data Kamar tidak ditemukan']);        }

        $datakamar->update($validated);
        return redirect()->route('tampil-kamar')->with('success', 'Data Kamar berhasil diperbarui');
    }

    public function show($id) {
        $datakamar = Datakamar::findOrFail($id);
        return response()->json($datakamar);
    }

    public function destroy(Datakamar $datakamar)
    {
        $datakamar->delete();
        return redirect()->route('tampil-kamar')->with('success', 'Kamar berhasil dihapus');
    }

    public function excel()
    {
        return Excel::download(new KamarExport, 'Datakamar.xlsx');
    }

    public function pdf(){
        $data = Datakamar::all();
        return view('pemilik.datakamar.pdf', ['datakamar' => $data ]);
    }

    public function kamarTersedia()
    {
    $kamarTersedia = DataKamar::where('status', 'Tersedia')->get();
    return view('penghuni.kamar_tersedia', compact('kamarTersedia'));
    }

}
