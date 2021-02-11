<?php

namespace App\Notifications\Cabinets\Executor;

use App\Service\Messenger\NotifyCustomFields;
use App\Service\Messenger\NotifyMessenger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class customerRemoveExecutor extends Notification
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
        $text = "Заказчик <b>{$this->customerUsername}</b> отозвал ваш отклик с задания <b>{$this->taskTitle}</b>";

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
                    ->line("Заказчик {$this->customerUsername} отозвал ваш отклик с задания {$this->taskTitle}")
                    ->line("Нам очень жаль, что вы не подошли.")->subject("С задания {$this->taskTitle} был отклонён отклик");
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
