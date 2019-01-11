<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\PinMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\MessageIdVariableTrait;

/**
 * Class PinChatMessageMethod.
 *
 * @see https://core.telegram.org/bots/api#pinchatmessage
 */
class PinChatMessageMethod implements PinMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    use MessageIdVariableTrait;

    /**
     * Optional. Pass True, if it is not necessary to send a notification to all chat members about the new
     * pinned message. Notifications are always disabled in channels.
     *
     * @var bool|null
     */
    public $disableNotification;

    /**
     * @param int|string $chatId
     * @param int        $messageId
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return PinChatMessageMethod
     */
    public static function create($chatId, int $messageId, array $data = null): PinChatMessageMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
