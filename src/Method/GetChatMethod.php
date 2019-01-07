<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatMethod.
 *
 * @see https://core.telegram.org/bots/api#getchat
 */
class GetChatMethod
{
    use ChatIdVariableTrait;

    /**
     * @param int|string $chatId
     *
     * @return GetChatMethod
     */
    public static function create($chatId): GetChatMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        return $instance;
    }
}
