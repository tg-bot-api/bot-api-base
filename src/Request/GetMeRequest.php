<?php


namespace Greenplugin\TelegramBot\Request;


use Greenplugin\TelegramBot\Response\UserResponse;

class GetMeRequest
{
    public function getMethod()
    {
        return 'getMe';
    }
}