<?php

namespace App\Http\Controllers;
use App\Models\Datakos;
use App\Models\Datakamar; 
use App\Models\DataPenghuni;
use App\Models\Datapemasukan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data_kost = Datakos::all();
        $totalKamar = Datakamar::count();
        $kamarTersedia = Datakamar::where('status', 'Tersedia')->count();
        $belumLunas = DataPenghuni::where('status', 'Belum Lunas')->count();
        $totalPemasukan = Datapemasukan::sum('jumlah');
        $penghuni = DataPenghuni::count();

        return view('pemilik.dashboard', compact(
            'data_kost',
            'totalKamar',
            'kamarTersedia',
            'belumLunas',
            'totalPemasukan',
            'penghuni'
        ));
    }
}
