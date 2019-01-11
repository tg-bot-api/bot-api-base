<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\UnbanMethodAliasInterface;
use TgBotApi\BotApiBase\Method\UnbanChatMemberMethod;

/**
 * Trait UnbanMethodTrait.
 */
trait UnbanMethodTrait
{
    /**
     * @param UnbanMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function unban(UnbanMethodAliasInterface $method): bool;

    /**
     * @param UnbanChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function unbanChatMember(UnbanChatMemberMethod $method): bool
    {
        return $this->unban($method);
    }
}
