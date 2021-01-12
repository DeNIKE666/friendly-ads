<?php


namespace App\Service\Messenger\Telegram;


use BotMan\BotMan\Facades\BotMan;
use BotMan\Drivers\Telegram\TelegramDriver;

class SenderMessage
{
    public function __construct($user_id, $message)
    {
        BotMan::say($message, $user_id , TelegramDriver::class , [
            'parse_mode' => 'html'
        ]);
    }
}