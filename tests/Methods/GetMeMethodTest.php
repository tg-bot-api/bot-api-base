<?php

namespace Greenplugin\TelegramBot\Methods;

use Greenplugin\TelegramBot\BotApi;
use Greenplugin\TelegramBot\HttpClientInterface;
use Greenplugin\TelegramBot\Method\GetMeMethod;
use Greenplugin\TelegramBot\Type\UserType;

class GetMeMethodTest extends \PHPUnit\Framework\TestCase
{
    public function testEncode()
    {
        $stub = $this->getMockBuilder(HttpClientInterface::class)
            ->getMock();

        $stub->method('post')
            ->with('https://api.telegram.org/bot000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/getMe', [])
            ->willReturn(json_decode('{"ok":true,"result":{"id":1,"is_bot":true,"first_name":"testbot","username":"TestBot"}}'));

        $botApi = new BotApi($stub, '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
        $result = $botApi->getMe(new GetMeMethod());

        $type  = new UserType();
        $type->id = 1;
        $type->isBot = true;
        $type->firstName = "testbot";
        $type->lastName = null;
        $type->username = "TestBot";
        $type->languageCode = null;

        $this->assertEquals($result, $type);
    }
}