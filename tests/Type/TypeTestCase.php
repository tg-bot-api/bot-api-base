<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Type;

use Greenplugin\TelegramBot\ApiClientInterface;
use Greenplugin\TelegramBot\BotApi;

abstract class TypeTestCase extends \PHPUnit\Framework\TestCase
{
    protected function getBot($result)
    {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->willReturn((object) (['ok' => true, 'result' => $result]));

        return new BotApi('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub);
    }
}
