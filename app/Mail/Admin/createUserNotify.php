<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class createUserNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $text;

    public function __construct($email, $text)
    {
        $this->email    = $email;
        $this->text     = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.admin.userCreateNotify' , [
            'text'=> $this->text
        ])
            ->subject('Данные для входа')
            ->to($this->email);
    }
}
