<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class JournalRejectedNotification extends Notification
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
            'title' => 'Jurnal Perlu Perbaikan',
            'message' => 'Jurnal ('.Carbon::parse($this->journal->date)->translatedFormat('d M Y').') dikembalikan. Catatan: '.$this->journal->teacher_notes,
            'type' => 'error',
            'url' => route('student.journals'),
        ];
    }
}
