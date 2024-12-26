<?php

namespace App\Notifications;

use App\Models\DataPenghuni;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class PesananBaruNotification extends Notification
{
    use Queueable;

    public $penghuni;

    public function __construct(DataPenghuni $penghuni)
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
            'message' => 'Penghuni ' . $this->penghuni->user->name . ' telah memesan ' . $this->penghuni->datakamar->no_kamar,
            'url' => route('detail-pemesanan', $this->penghuni->id),
        ];
    }
}
