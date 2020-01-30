<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Type;

use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Tests\GetNormalizerTrait;

abstract class TypeTestCase extends \PHPUnit\Framework\TestCase
{
    use GetNormalizerTrait;

    /**
     * @return BotApi
     */
    public function getBotFromJson(string $json)
    {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->willReturn(\json_decode($json, false));

        return new BotApi('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, $this->getNormalizer());
    }

    /**
     * @param $result
     */
    protected function getBot($result): BotApi
    {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->willReturn((object) (['ok' => true, 'result' => $result]));

        /* @var ApiClientInterface $stub */
        return new BotApi('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, $this->getNormalizer());
    }

    protected function getMethod(): MethodInterface
    {
        return $this->getMockBuilder(MethodInterface::class)->getMock();
    }

    protected function getResource($filename): string
    {
        return \file_get_contents(\sprintf('%s/resources/%s.json', __DIR__, $filename));
    }
}
