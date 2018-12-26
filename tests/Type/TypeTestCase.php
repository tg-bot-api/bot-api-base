<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Type;

use Greenplugin\TelegramBot\BotApi;
use Greenplugin\TelegramBot\HttpClientInterface;

abstract class TypeTestCase extends \PHPUnit\Framework\TestCase
{
    protected function getBot($result)
    {
        $stub = $this->getMockBuilder(HttpClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('post')
            ->willReturn((object) (['ok' => true, 'result' => $result]));

        return new BotApi($stub, '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
    }
}
