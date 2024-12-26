<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapenghuni;
use App\Models\Datapemasukan;

class AdminController extends Controller
{
    public function approvePayment($id)
    {
        $penghuni = Datapenghuni::findOrFail($id);

        // Ubah status penghuni
        $penghuni->status = 'Lunas';
        $penghuni->save();

        // Perbarui status kamar
        $penghuni->datakamar->status = 'Disewa';
        $penghuni->datakamar->save();

        // Tambahkan data pemasukan
        Datapemasukan::create([
            'penghuni_id' => $penghuni->id,
            'jumlah' => $penghuni->datakamar->harga_bulanan,
            'tanggal' => now(),
        ]);

        // Tandai notifikasi sebagai dibaca
        $notification = auth()->user()->notifications()->where('data->penghuni_id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('success', 'Pembayaran telah disetujui.');
    }
}
