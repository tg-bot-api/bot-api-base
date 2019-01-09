<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\PromoteChatMemberMethod;

/**
 * Trait PromoteMethodTrait.
 */
trait PromoteMethodTrait
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
     * @param PromoteChatMemberMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function promoteChatMember(PromoteChatMemberMethod $method): bool
    {
        return $this->call($method);
    }
}
