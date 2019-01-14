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
     * @var BotApiNormalizer
     */
    private $normalizer;

    /**
     * WebhookFetcher constructor.
     *
     * @param BotApiNormalizer $normalizer
     */
    public function __construct(BotApiNormalizer $normalizer)
    {
        $this->normalizer = $normalizer;
    }

    /**
     * @param RequestInterface $request
     *
     * @throws BadRequestException
     *
     * @return UpdateType
     */
    public function fetch(RequestInterface $request): UpdateType
    {
        $input = \json_decode($request->getBody()->getContents());
        if (!($input instanceof \stdClass)) {
            throw new BadRequestException();
        }

        return $this->normalizer->denormalize($input, UpdateType::class);
    }
}
