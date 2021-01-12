<?php


namespace App\Service\Messenger;


use App\Service\Messenger\Telegram\SenderMessage;

class NotifyCustomFields
{
    public $content, $user_id;

    /**
     * @param $user
     * @return $this
     */

    public function user($user)
    {
        $this->user_id = $user;

        return $this;
    }

    /**
     * @param $content
     * @return $this
     */

    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param $type
     * @return $this\
     */

    public function messenger($type)
    {
        if ($type == 'telegram') :
            (new SenderMessage($this->user_id, $this->content));
        endif;

        return $this;
    }
}