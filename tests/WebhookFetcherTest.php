<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use TgBotApi\BotApiBase\Exception\BadRequestException;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\WebhookFetcher;

class WebhookFetcherTest extends TestCase
{
    use GetNormalizerTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadRequestException
     */
    public function testHandleWebhook()
    {
        $fetcher = new WebhookFetcher($this->getNormalizer());
        $update = $fetcher->fetch($this->getRequest('{"a":"b"}'));
        $this->assertInstanceOf(UpdateType::class, $update);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadRequestException
     */
    public function testHandleWebhookError()
    {
        $this->expectException(BadRequestException::class);

        $fetcher = new WebhookFetcher($this->getNormalizer());
        $fetcher->fetch($this->getRequest('[]'));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadRequestException
     */
    public function testHandleWebhookWithString()
    {
        $fetcher = new WebhookFetcher($this->getNormalizer());
        $update = $fetcher->fetch('{"a":"b"}');
        $this->assertInstanceOf(UpdateType::class, $update);
    }

    private function getRequest(string $contents): MockObject
    {
        $request = $this->getMockBuilder(RequestInterface::class)->getMock();
        $body = $this->getMockBuilder(StreamInterface::class)->getMock();
        $body->expects($this->once())->method('getContents')->willReturn($contents);
        $request->expects($this->once())->method('getBody')->willReturn($body);

        return $request;
    }
}
