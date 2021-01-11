<?php

namespace App\Notifications\Admin;

use App\Models\User;
use App\Service\NotifyCustomFields;
use App\Service\NotifyMessenger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class createUser extends Notification
{
    use Queueable;

    public $user;
    public $text;
    public $password;

    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;

        $this->text = sprintf(config('messages.admin.createUser'),
            $user->email, $this->password
        );
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

    /**
     * @param $notifiable
     * @return NotifyCustomFields
     */

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
        return (new MailMessage)->view('email.admin.userCreateNotify', [
            'email'    => $this->user->email,
            'password' => $this->password
        ])->subject('Данные для входа в ваш аккаунт');
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
