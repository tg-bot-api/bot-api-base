<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Traits;

use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\Interfaces\PromoteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\PromoteChatMemberMethod;

/**
 * Trait PromoteMethodTrait.
 */
trait PromoteMethodTrait
{
    /**
     * @param PromoteMethodAliasInterface $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    abstract public function promote(PromoteMethodAliasInterface $method): bool;

    /**
     * @param PromoteChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function promoteChatMember(PromoteChatMemberMethod $method): bool
    {
        return $this->promote($method);
    }
}
