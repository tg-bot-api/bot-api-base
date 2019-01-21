<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

abstract class TypeTestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $result
     *
     * @return BotApi
     */
    protected function getBot($result): BotApi
    {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->willReturn((object) (['ok' => true, 'result' => $result]));

        /* @var ApiClientInterface $stub */
        return new BotApi('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, new BotApiNormalizer());
    }

    /**
     * @return MethodInterface
     */
    protected function getMethod(): MethodInterface
    {
        return $this->getMockBuilder(MethodInterface::class)->getMock();
    }
}
