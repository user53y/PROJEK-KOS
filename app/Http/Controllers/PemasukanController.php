<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use App\Models\Datapemasukan;
use App\Models\Penghuni;
use App\Models\Kamar;

class PemasukanController extends Controller
{
    public function index()
    {
        $datapemasukan = Datapemasukan::with('penghuni', 'kamar')->get();
        return view('pemilik.datapemasukan.index', compact('datapemasukan'));
    }


    public function destroy($id)
    {
        $pemasukan = Datapemasukan::findOrFail($id);
        $pemasukan->delete();
        return redirect()->back()->with('success', 'Pemasukan berhasil dihapus.');
    }
}
