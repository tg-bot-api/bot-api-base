<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\LeaveChatMethod;

/**
 * Trait LeaveMethodTrait.
 */
trait LeaveMethodTrait
{
    /**
     * @param LeaveMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function leave(LeaveMethodAliasInterface $method): bool;

    /**
     * @param LeaveChatMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function leaveChat(LeaveChatMethod $method): bool
    {
        return $this->leave($method);
    }
}
