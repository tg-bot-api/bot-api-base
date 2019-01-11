<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\LeaveMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class LeaveChatMethod.
 *
 * @see https://core.telegram.org/bots/api#leavechat
 */
class LeaveChatMethod implements LeaveMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * @param int|string $chatId
     *
     * @return LeaveChatMethod
     */
    public static function create($chatId): LeaveChatMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        return $instance;
    }
}
