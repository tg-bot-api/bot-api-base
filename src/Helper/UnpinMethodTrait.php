<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\UnpinChatMessageMethod;

/**
 * Trait UbpinMethodTrait.
 */
trait UnpinMethodTrait
{
    /**
     * @param $method
     * @param $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    abstract public function call($method, $type = null);

    /**
     * @param UnpinChatMessageMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function unpinChatMessage(UnpinChatMessageMethod $method): bool
    {
        return $this->call($method);
    }
}
