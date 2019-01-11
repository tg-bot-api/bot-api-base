<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\KickMethodAliasInterface;
use TgBotApi\BotApiBase\Method\KickChatMemberMethod;

trait KickMethodTrait
{
    /**
     * @param KickMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function kick(KickMethodAliasInterface $method): bool;

    /**
     * @param KickChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function kickChatMember(KickChatMemberMethod $method): bool
    {
        return $this->kick($method);
    }
}
