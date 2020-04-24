<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use JsonSerializable;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

class BotResponseFactory implements BotPsrResponseFactoryInterface, BotSerializableResponseFactoryInterface
{
    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @var BotApiNormalizer
     */
    private $normalizer;

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    public function __construct(
        StreamFactoryInterface $streamFactory,
        ResponseFactoryInterface $responseFactory,
        BotApiNormalizer $normalizer
    ) {
        $this->responseFactory = $responseFactory;
        $this->normalizer = $normalizer;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @throws ExceptionInterface
     */
    public function createResponse(MethodInterface $method): ResponseInterface
    {
        $response = $this->responseFactory->createResponse();
        $response = $response->withBody($this->createBody($method));
        $response = $response->withHeader('content-type', 'application/json');

        return $response;
    }

    /**
     * @throws ExceptionInterface
     *
     * @return JsonSerializable | array
     */
    public function createSerializableResponse(MethodInterface $method)
    {
        return $this->normalizer->normalize($method)->getData();
    }

    /**
     * @param $method
     *
     * @throws ExceptionInterface
     */
    private function createBody(MethodInterface $method): StreamInterface
    {
        $data = $this->normalizer->normalize($method);

        return $this->streamFactory->createStream(\json_encode($data->getData()));
    }

    /**
     * @param $method
     */
    private function getMethodName($method): string
    {
        return \lcfirst(\substr(
            \get_class($method),
            \strrpos(\get_class($method), '\\') + 1,
            -6
        ));
    }
}
