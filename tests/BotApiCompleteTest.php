<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\GetMeMethod;

class BotApiCompleteTest extends TestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testException()
    {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->willReturn((object) (['ok' => false, 'description' => 'Exception']));

        /* @var ApiClientInterface $stub */
        $bot = new BotApiComplete('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, new BotApiNormalizer());

        $this->expectException(ResponseException::class);

        $bot->call(GetMeMethod::create());
    }
}
