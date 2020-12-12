<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use PHPUnit\Framework\MockObject\MockObject;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\Tests\GetNormalizerTrait;

abstract class TypeBaseTestCase extends TypeTestCase
{
    use GetNormalizerTrait;

    /**
     * @var BotApi
     */
    private $bot;

    /**
     * @var ApiClientInterface|MockObject
     */
    private $client;

    public function setUp(): void
    {
        $this->client = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $this->bot = new BotApi(
            '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
            $this->client,
            $this->getNormalizer()
        );
    }

    /**
     * @dataProvider provideData
     *
     * @param mixed $excepted
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testType(string $class, string $response, $excepted): void
    {
        $this->client
            ->expects(static::once())
            ->method('send')
            ->willReturn(\json_decode($response));

        $type = $this->bot->call($this->getMethod(), $class);

        if ($excepted instanceof $class) {
            static::assertEquals($excepted, $type);
        } else {
            foreach (\get_object_vars($type) as $var => $value) {
                if (null !== $var) {
                    static::assertEquals($excepted[$var], $value);
                }
            }
        }
    }

    abstract public function provideData(): array;
}
