<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class JournalApprovedNotification extends Notification
{
    use Queueable;

    public $journal;

    /**
     * Create a new notification instance.
     */
    public function __construct($journal)
    {
        $this->journal = $journal;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Jurnal Disetujui',
            'message' => 'Jurnal untuk tanggal '.Carbon::parse($this->journal->date)->translatedFormat('d M Y').' telah disetujui.',
            'type' => 'success',
            'url' => route('student.journals'),
        ];
    }
}
