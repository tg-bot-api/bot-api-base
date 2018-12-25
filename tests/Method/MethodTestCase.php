<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\BotApi;
use Greenplugin\TelegramBot\HttpClientInterface;

abstract class MethodTestCase extends \PHPUnit\Framework\TestCase
{
    protected function getBot($methodName, $request)
    {
        $stub = $this->getMockBuilder(HttpClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('post')
            ->with('https://api.telegram.org/bot000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/'.$methodName, $request)
            ->willReturn((object) (['ok' => true, 'result' => []]));

        return new BotApi($stub, '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
    }
}
