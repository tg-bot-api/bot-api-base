<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\RestrictMethodAliasInterface;
use TgBotApi\BotApiBase\Method\RestrictChatMemberMethod;

/**
 * Trait RestrictMethodTrait.
 */
trait RestrictMethodTrait
{
    /**
     * @param RestrictMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function restrict(RestrictMethodAliasInterface $method): bool;

    /**
     * @param RestrictChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function restrictChatMember(RestrictChatMemberMethod $method): bool
    {
        return $this->restrict($method);
    }
}
