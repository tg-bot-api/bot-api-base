<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class ApiClient.
 */
class ApiClient implements ApiClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $botKey;

    /**
     * @var string
     */
    private $endPoint;

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * ApiApiClient constructor.
     */
    public function __construct(
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        ClientInterface $client
    ) {
        $this->streamFactory = $streamFactory;
        $this->requestFactory = $requestFactory;
        $this->client = $client;
    }

    /**
     * @throws ClientExceptionInterface
     *
     * @return mixed
     */
    public function send(string $method, BotApiRequestInterface $apiRequest)
    {
        $request = $this->requestFactory->createRequest('POST', $this->generateUri($method));

        $boundary = \uniqid('', true);

        $stream = $this->streamFactory->createStream($this->createStreamBody($boundary, $apiRequest));

        $response = $this->client->sendRequest($request
            ->withHeader('Content-Type', 'multipart/form-data; boundary="' . $boundary . '"')
            ->withBody($stream));

        $content = $response->getBody()->getContents();

        return \json_decode($content, false);
    }

    public function setBotKey(string $botKey): void
    {
        $this->botKey = $botKey;
    }

    public function setEndpoint(string $endPoint): void
    {
        $this->endPoint = $endPoint;
    }

    protected function generateUri(string $method): string
    {
        return \sprintf(
            '%s/bot%s/%s',
            $this->endPoint,
            $this->botKey,
            $method
        );
    }

    /**
     * @param mixed $boundary
     */
    protected function createStreamBody($boundary, BotApiRequestInterface $request): string
    {
        $stream = '';
        foreach ($request->getData() as $name => $value) {
            // todo [GreenPlugin] fix type cast and replace it to normalizer
            $stream .= $this->createDataStream($boundary, $name, (string) $value);
        }

        foreach ($request->getFiles() as $name => $file) {
            $stream .= $this->createFileStream($boundary, $name, $file);
        }

        return '' !== $stream ? $stream . "--$boundary--\r\n" : '';
    }

    /**
     * @param $boundary
     * @param $name
     */
    protected function createFileStream($boundary, $name, InputFileType $file): string
    {
        $headers = \sprintf(
            "Content-Disposition: form-data; name=\"%s\"; filename=\"%s\"\r\n",
            $name,
            $file->getBasename()
        );
        $headers .= \sprintf("Content-Length: %s\r\n", (string) $file->getSize());
        $headers .= \sprintf("Content-Type: %s\r\n", \mime_content_type($file->getRealPath()));

        $streams = "--$boundary\r\n$headers\r\n";
        $streams .= \file_get_contents($file->getRealPath());
        $streams .= "\r\n";

        return $streams;
    }

    /**
     * @param $boundary
     * @param $name
     * @param $value
     */
    protected function createDataStream(string $boundary, string $name, string $value): string
    {
        $headers = \sprintf("Content-Disposition: form-data; name=\"%s\"\r\n", $name);
        $headers .= \sprintf("Content-Length: %s\r\n", (string) \strlen($value));

        return "--$boundary\r\n$headers\r\n$value\r\n";
    }
}
