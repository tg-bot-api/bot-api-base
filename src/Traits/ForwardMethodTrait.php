<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait ForwardMethodTrait.
 */
trait ForwardMethodTrait
{
    /**
     * @param ForwardMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    abstract public function forward(ForwardMethodAliasInterface $method): MessageType;

    /**
     * @param ForwardMessageMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function forwardMessage(ForwardMessageMethod $method): MessageType
    {
        return $this->forward($method);
    }
}
