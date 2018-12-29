<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\ApiClientInterface;
use Greenplugin\TelegramBot\BotApi;

abstract class MethodTestCase extends \PHPUnit\Framework\TestCase
{
    protected function getBot($methodName, $request)
    {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->with($methodName, $request)
            ->willReturn((object) (['ok' => true, 'result' => []]));

        return new BotApi('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub);
    }
}
