<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\Interfaces\ForwardMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class ForwardMessageMethod.
 *
 * @see https://core.telegram.org/bots/api#forwardmessage
 */
class ForwardMessageMethod implements SendMethodAliasInterface, ForwardMethodAliasInterface
{
    use FillFromArrayTrait;
    use ChatIdVariableTrait;
    /**
     * Unique identifier for the chat where the original message was sent
     * (or channel username in the format @channelusername).
     *
     * @var int|string
     */
    public $fromChatId;

    /**
     * Optional. Sends the message silently. Users will receive a notification with no sound.
     *
     * @var bool|null
     */
    public $disableNotification;

    /**
     * Message identifier in the chat specified in from_chat_id.
     *
     * @var int
     */
    public $messageId;

    /**
     * @param int|string $chatId
     * @param int|string $fromChatId
     * @param int        $messageId
     * @param array|null $data
     *
     * @throws BadArgumentException
     *
     * @return ForwardMessageMethod
     */
    public static function create($chatId, $fromChatId, int $messageId, array $data = null): self
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->fromChatId = $fromChatId;
        $instance->messageId = $messageId;

        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
