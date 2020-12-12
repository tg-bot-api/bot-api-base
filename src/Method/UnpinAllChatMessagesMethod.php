<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\UnpinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Use this method to clear the list of pinned messages in a chat.
 * If the chat is not a private chat, the bot must be an administrator
 * in the chat for this to work and must have the 'can_pin_messages'
 * admin right in a supergroup or 'can_edit_messages' admin right in a channel.
 * Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#unpinallchatmessages
 */
class UnpinAllChatMessagesMethod implements UnpinMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * @param int|string $chatId
     */
    public static function create($chatId): UnpinAllChatMessagesMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        return $instance;
    }
}
