<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PatientNotification extends Notification
{
    use Queueable;

    private $details;
    protected $pdf;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details,$pdf)
    {
        $this->details = $details;
        $this->pdf = $pdf;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject($this->details['subject']) // Adding the subject
        ->greeting($this->details['greeting'])
        ->line($this->details['body'])
        ->line($this->details['lastline'])
        ->line($this->details['company_name'])
        ->attachData($this->pdf, 'invoice.pdf', [
            'mime' => 'application/pdf',
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
