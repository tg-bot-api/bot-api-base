<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatAdministratorsMethod.
 *
 * @see https://core.telegram.org/bots/api#getchatadministrators
 */
class GetChatAdministratorsMethod implements MethodInterface
{
    use ChatIdVariableTrait;

    /**
     * @param int|string $chatId
     *
     * @return GetChatAdministratorsMethod
     */
    public static function create($chatId): GetChatAdministratorsMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        return $instance;
    }
}
