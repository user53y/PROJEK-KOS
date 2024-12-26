<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapenghuni;
use App\Notifications\PaymentNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\PaymentApprovalNotification;

class PenghuniController extends Controller
{
    public function cekPembayaran()
    {
        $penghuni = Datapenghuni::where('user_id', Auth::id())->first();

        return view('penghuni.status', compact('penghuni'));
    }

    public function uploadPaymentProof(Request $request, $id)
    {
        $request->validate([
            'paymentProof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $penghuni = Datapenghuni::findOrFail($id);

        if ($request->hasFile('paymentProof')) {
            $file = $request->file('paymentProof');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Move file directly to public/images
            $file->move(public_path('images'), $fileName);

            $penghuni->bukti_pembayaran = $fileName;
            $penghuni->status = 'Menunggu Konfirmasi';
            $penghuni->save();

            $pemilik = User::where('role', 'pemilik')->get();
            foreach ($pemilik as $owner) {
                $owner->notify(new PaymentApprovalNotification($penghuni));
            }
        }

        return redirect()->route('cek-pembayaran')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
