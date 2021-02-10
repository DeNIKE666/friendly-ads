<?php

namespace App\Notifications\Cabinets\Customer;

use App\Service\Messenger\NotifyCustomFields;
use App\Service\Messenger\NotifyMessenger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class unSubscribeTaskForCustomer extends Notification
{
    use Queueable;

    /**
     * @var
     */

    public $taskTitle;

    /**
     * @var $executorUsername
     */

    public $executorUsername;


    public function __construct($taskTitle, $executorUsername)
    {
        $this->executorUsername  = $executorUsername;
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
        return ['mail', NotifyMessenger::class];
    }

    public function toNotifyMessenger($notifiable) : NotifyCustomFields
    {
        $text = "Пользователь <b>{$this->executorUsername}</b> отозвал отклик с вашего задания <b>{$this->taskTitle}</b>";

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
                    ->line('Пользователь ' . $this->executorUsername . ' отозвал отклик с вашего задания ('.$this->taskTitle.')')
                    ->action('Перейдите в свой кабинет'  , route('cabinets'))
                    ->subject('На вашем задании ('.$this->taskTitle.') был отозван отклик');
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
