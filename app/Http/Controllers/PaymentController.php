<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datapenghuni;
use App\Models\User;
use App\Notifications\PaymentApprovalNotification;

class PaymentController extends Controller
{
    public function uploadPaymentProof(Request $request, $id)
    {
        $penghuni = Datapenghuni::findOrFail($id);

        $request->validate(['paymentProof' => 'required|file']);
        $path = $request->file('paymentProof')->store('payment_proofs');
        $penghuni->bukti_pembayaran = $path;
        $penghuni->save();

        $admins = User::where('role', 'pemilik')->get();
        foreach ($admins as $admin) {
            $admin->notify(new PaymentApprovalNotification($penghuni));
        }
        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->back();
    }
}
