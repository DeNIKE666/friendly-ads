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

    public function __construct()
    {
        //
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
        $text = sprintf("Информация вашего аккаунта была обновлена. \n\nИмя: %s \nВаш E-mail: %s \nВаш логин: %s \nБаланс: %s руб.", $notifiable->name, $notifiable->email, $notifiable->username, $notifiable->balance);

        return (new NotifyCustomFields())
            ->user($notifiable->telegram_id)
            ->content($text)
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
                    ->line("Информация вашего аккаунта была обновлена")
                    ->line("Имя: {$notifiable->name}")
                    ->line("Ваш E-mail: {$notifiable->email}")
                    ->line("Ваш логин: {$notifiable->username}")
                    ->line("Ваш баланс: {$notifiable->balance} руб.")
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
