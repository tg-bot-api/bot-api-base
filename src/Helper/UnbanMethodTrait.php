<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\UnbanChatMemberMethod;

/**
 * Trait UnbanMethodTrait.
 */
trait UnbanMethodTrait
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
     * @param UnbanChatMemberMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return bool
     */
    public function unbanChatMember(UnbanChatMemberMethod $method): bool
    {
        return $this->call($method);
    }
}
