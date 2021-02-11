<?php

namespace App\Notifications\Cabinets\Executor;

use App\Service\Messenger\NotifyCustomFields;
use App\Service\Messenger\NotifyMessenger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class customerAcceptExecutor extends Notification
{
    use Queueable;

    /**
     * @var
     */

    public $taskTitle;

    /**
     * @var $customerUsername
     */

    public $customerUsername;


    public function __construct($taskTitle, $customerUser)
    {
        $this->customerUsername  = $customerUser;
        $this->taskTitle         = $taskTitle;
    }

    /**
     * @param $notifiable
     * @return string[]
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
        $text = "Заказчик <b>{$this->customerUsername}</b> принял ваш отклик в задании <b>{$this->taskTitle}</b> поздравяем.";

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
                    ->line("Заказчик {$this->customerUsername} принял ваш отклик в задании {$this->taskTitle} поздравяем.")
                    ->subject("Ваш отклик на задании {$this->taskTitle} был одобрен");
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
