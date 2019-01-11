<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\PinChatMessageMethod;

/**
 * Trait PinMethodTrait.
 */
trait PinMethodTrait
{
    /**
     * @param PinMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function pin(PinMethodAliasInterface $method): bool;

    /**
     * @param PinChatMessageMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function pinChatMessage(PinChatMessageMethod $method): bool
    {
        return $this->pin($method);
    }
}
