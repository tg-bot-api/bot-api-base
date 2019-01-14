<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\Exception\BadRequestException;
use TgBotApi\BotApiBase\WebhookFetcher;

class WebhookFetcherTest extends TestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadRequestException
     */
    public function testHandleWebhook()
    {
        $handler = new WebhookFetcher(new BotApiNormalizer());
        $handler->fetch($this->getRequest('{"a":"b"}'));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadRequestException
     */
    public function testHandleWebhookError()
    {
        $this->expectException(BadRequestException::class);

        $handler = new WebhookFetcher(new BotApiNormalizer());
        $handler->fetch($this->getRequest('[]'));
    }

    private function getRequest(string $contents)
    {
        $request = $this->getMockBuilder(RequestInterface::class)->getMock();
        $body = $this->getMockBuilder(StreamInterface::class)->getMock();
        $body->expects($this->once())->method('getContents')->willReturn($contents);
        $request->expects($this->once())->method('getBody')->willReturn($body);

        return $request;
    }
}
