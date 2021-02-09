<?php

namespace App\Notifications\Cabinets;

use App\Service\Messenger\NotifyCustomFields;
use App\Service\Messenger\NotifyMessenger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class userUpdateAccount extends Notification
{
    use Queueable;

    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', NotifyMessenger::class];
    }

    public function toNotifyMessenger($notifiable) : NotifyCustomFields
    {
        return (new NotifyCustomFields())
            ->user($notifiable->telegram_id)
            ->content($this->text)
            ->messenger('telegram');
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
                    ->line($this->text)
                    ->subject('Аккаунт был обновлён');
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
