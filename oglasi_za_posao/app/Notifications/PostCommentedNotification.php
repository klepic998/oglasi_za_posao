<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostCommentedNotification extends Notification
{
    use Queueable;

    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details=$details;
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
                    ->from('pronadjiposao008@gmail.com','PronađiPosao.ba')
                    ->subject('Novi komentar!')
                    ->greeting('Pozdrav, '. $this->details['name'] .'!')
                    ->line('Neko je upravo komentarisao Vašu objavu.')
                    ->line('Kliknite na sljedeći link da biste vidjeli svoj oglas!')
                    ->action('Klikni ovdje!', url(route('show.users.post',$this->details['id'])))
                    ->line('Hvala Vam što koristite aplikaciju!');
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
