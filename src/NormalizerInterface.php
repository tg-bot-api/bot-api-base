<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Interface NormalizerInterface.
 */
interface NormalizerInterface
{
    /**
     * @param $data
     * @param $type
     *
     * @return object|array
     */
    public function denormalize($data, string $type);

    /**
     * @param $method
     *
     * @return BotApiRequestInterface
     */
    public function normalize($method): BotApiRequestInterface;
}
