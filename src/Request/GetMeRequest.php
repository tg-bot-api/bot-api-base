<?php


namespace Greenplugin\TelegramBot\Request;


use Greenplugin\TelegramBot\Type\UserResponse;

class GetMeRequest
{
    public function getMethod()
    {
        return 'getMe';
    }
}