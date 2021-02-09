<?php

namespace App\Notifications\Cabinets\Customer;

use App\Service\Messenger\NotifyCustomFields;
use App\Service\Messenger\NotifyMessenger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class subscribeTaskForCustomer extends Notification
{
    use Queueable;

    /**
     * @var $task
     */

    public $task;

    /**
     * @var $executorSubscribe
     */

    public $executorSubscribe;

    public function __construct($task, $executor)
    {
        $this->executorSubscribe = $executor;
        $this->task              = $task;
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
        $text = "На ваше задание <b>{$this->task->title}</b> оставил отклик пользователь <b>{$this->executorSubscribe}</b>";

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
                    ->line('На ваше задание ('.$this->task->title.') оставил отклик пользователь ' . $this->executorSubscribe)
                    ->action('Перейдите в свой кабинет'  , route('cabinets'))
                    ->subject('На ваше задание ('.$this->task->title.') был оставлен отклик');
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
