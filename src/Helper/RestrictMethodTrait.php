<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\RestrictChatMemberMethod;

/**
 * Trait RestrictMethodTrait.
 */
trait RestrictMethodTrait
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
     * @param RestrictChatMemberMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function restrictChatMember(RestrictChatMemberMethod $method): bool
    {
        return $this->call($method);
    }
}
