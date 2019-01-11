<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\MessageIdVariableTrait;

/**
 * Class DeleteMessageMethod.
 *
 * Use this method to delete a message, including service messages, with the following limitations:
 * - A message can only be deleted if it was sent less than 48 hours ago.
 * - Bots can delete outgoing messages in private chats, groups, and supergroups.
 * - Bots granted can_post_messages permissions can delete outgoing messages in channels.
 * - If the bot is an administrator of a group, it can delete any message there.
 * - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
 * Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#deletemessage
 */
class DeleteMessageMethod implements DeleteMethodAliasInterface
{
    use ChatIdVariableTrait;
    use MessageIdVariableTrait;

    /**
     * @param int|string $chatId
     * @param int        $messageId
     *
     * @return DeleteMessageMethod
     */
    public static function create($chatId, int $messageId): DeleteMessageMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;

        return $instance;
    }
}
