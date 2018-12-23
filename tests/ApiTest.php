<?php

namespace Greenplugin\TelegramBot;

class ApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function testTrueIsTrue()
    {

        $botApi = new BotApi(new Stubs\HttpClient(), '');
        $this->assertInstanceOf(BotApiInterface::class, $botApi);
    }
}
