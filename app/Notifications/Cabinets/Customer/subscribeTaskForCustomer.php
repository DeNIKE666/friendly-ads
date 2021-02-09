<?php

namespace App\Notifications\Cabinets\Customer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class subscribeTaskForCustomer extends Notification
{
    use Queueable;

    /**
     * @var $taskTitle
     */

    public $taskTitle;

    /**
     * @var $executorSubscribe
     */

    public $executorSubscribe;

    public function __construct($taskTitle, $executor)
    {
        $this->executorSubscribe = $executor;
        $this->taskTitle         = $taskTitle;
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
                    ->line('На ваше задание ('.$this->taskTitle.') оставил отклик пользователь ' . $this->executorSubscribe)
                    ->action('Перейдите в свой кабинет'  , route('cabinets'))
                    ->subject('На ваше задание ('.$this->taskTitle.') был оставлен отклик');
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
