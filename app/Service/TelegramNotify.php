<?php


namespace App\Service;


use BotMan\BotMan\Cache\LaravelCache;
use BotMan\BotMan\Facades\BotMan;
use BotMan\Drivers\Telegram\TelegramDriver;

class TelegramNotify
{
    static function send($id, $message)
    {
        BotMan::say($message, $id, TelegramDriver::class);
    }
}