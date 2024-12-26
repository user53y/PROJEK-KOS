<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PaymentApprovalNotification extends Notification
{
    use Queueable;

    private $penghuni;

    public function __construct($penghuni)
    {
        $this->penghuni = $penghuni;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Pembayaran  {$this->penghuni->datakamar->no_kamar} membutuhkan persetujuan.",
            'penghuni_id' => $this->penghuni->id,
            'payment_proof' => $this->penghuni->bukti_pembayaran,
        ];
    }
}
