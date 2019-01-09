<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Type\MessageType;

/**
 * Trait ForwardMethodTrait.
 */
trait ForwardMethodTrait
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
     * @param ForwardMessageMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function forwardMessage(ForwardMessageMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }
}
