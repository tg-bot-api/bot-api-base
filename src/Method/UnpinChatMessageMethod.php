<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\UnpinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class UnpinChatMessageMethod.
 *
 * @see https://core.telegram.org/bots/api#unpinchatmessage
 */
class UnpinChatMessageMethod implements UnpinMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;

    /**
     * Optional Identifier of a message to unpin. If not specified,
     * the most recent pinned message (by sending date) will be unpinned.
     *
     * @var int|null
     */
    public $messageId;

    /**
     * @param int|string $chatId
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create($chatId, array $data = null): UnpinChatMessageMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        if (!empty($data)) {
            $instance->fill($data);
        }

        return $instance;
    }
}
