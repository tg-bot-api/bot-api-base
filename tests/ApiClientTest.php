<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use TgBotApi\BotApiBase\ApiClient;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiRequest;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class ApiClientTest.
 *
 * @todo write real test instead this
 */
class ApiClientTest extends TestCase
{
    public function testApi()
    {
        $client = $this->getApiClient();
        $this->assertInstanceOf(ApiClientInterface::class, $client);
        $client->send('getMe', new BotApiRequest(['name' => 'value'], [new InputFileType('/dev/null')]));
    }

    /**
     * @return RequestFactoryInterface
     */
    public function getRequestFactory(): RequestFactoryInterface
    {
        $requestFactory = $this->getMockBuilder(RequestFactoryInterface::class)
            ->getMock();

        $requestFactory->expects($this->once())
            ->method('createRequest')
            ->willReturn(($this->createRequest()));

        /* @var RequestFactoryInterface $requestFactory */
        return $requestFactory;
    }

    /**
     * @return StreamFactoryInterface
     */
    public function getStreamFactory(): StreamFactoryInterface
    {
        $streamFactory = $this->getMockBuilder(StreamFactoryInterface::class)
            ->getMock();

        $stream = $this->getMockBuilder(StreamInterface::class)
            ->getMock();

        $streamFactory->expects($this->once())
            ->method('createStream')
            ->willReturn($stream);

        /* @var StreamFactoryInterface $streamFactory */
        return $streamFactory;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        $client = $this->getMockBuilder(ClientInterface::class)
            ->getMock();

        $response = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();

        $stream = $this->getMockBuilder(StreamInterface::class)
            ->getMock();

        $stream->expects($this->once())
            ->method('getContents')
            ->willReturn('{}');

        $response->expects($this->once())
            ->method('getBody')
            ->willReturn($stream);

        $client->expects($this->once())
            ->method('sendRequest')
            ->willReturn($response);

        /* @var ClientInterface $client */
        return $client;
    }

    /**
     * @return RequestInterface
     */
    public function createRequest(): RequestInterface
    {
        $request = $this->getMockBuilder(RequestInterface::class)
            ->getMock();

        $request->expects($this->once())
            ->method('withBody')
            ->willReturn($request);

        $request->expects($this->once())
            ->method('withHeader')
            ->willReturn($request);

        /* @var RequestInterface $request */
        return $request;
    }

    /**
     * @return ApiClientInterface
     */
    private function getApiClient(): ApiClientInterface
    {
        $client = new ApiClient($this->getRequestFactory(), $this->getStreamFactory(), $this->getClient());
        $client->setBotKey('key');
        $client->setEndpoint('endpoint');

        return $client;
    }
}
