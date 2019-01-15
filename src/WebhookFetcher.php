<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Psr\Http\Message\RequestInterface;
use TgBotApi\BotApiBase\Exception\BadRequestException;
use TgBotApi\BotApiBase\Type\UpdateType;

/**
 * Class WebhookFetcher.
 */
class WebhookFetcher implements WebhookFetcherInterface
{
    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    /**
     * WebhookFetcher constructor.
     *
     * @param NormalizerInterface $normalizer
     */
    public function __construct(NormalizerInterface $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    /**
     * @param RequestInterface|string $request
     *
     * @throws BadRequestException
     *
     * @return UpdateType
     */
    public function fetch($request): UpdateType
    {
        $input = \json_decode($this->getContents($request));
        if (!($input instanceof \stdClass)) {
            throw new BadRequestException('Request content must be valid JSON object.');
        }

        return $this->normalizer->denormalize($input, UpdateType::class);
    }

    /**
     * @param $request
     *
     * @throws BadRequestException
     *
     * @return string
     */
    private function getContents($request): string
    {
        if ($request instanceof RequestInterface) {
            return $request->getBody()->getContents();
        }
        if (\is_string($request)) {
            return $request;
        }
        throw new BadRequestException('Request must be instance of Psr\Http\Message\RequestInterface or string.');
    }
}
