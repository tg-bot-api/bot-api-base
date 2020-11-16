<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;
use TgBotApi\BotApiBase\Method\Traits\CaptionVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;

/**
 * Use this method to copy messages of any kind. The method is analogous to the method forwardMessages, but the copied
 * message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
 *
 * @see https://core.telegram.org/bots/api#copymessage
 */
class CopyMessageMethod implements HasParseModeVariableInterface, MethodInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;

    /**
     * Unique identifier for the chat where the original
     * message was sent (or channel username in the format @channelusername).
     *
     * @var int|string
     */
    public $fromChatId;

    /**
     * Message identifier in the chat specified in from_chat_id.
     *
     * @var int
     */
    public $messageId;

    /**
     * @param $chatId
     * @param $fromChatId
     */
    public static function create($chatId, $fromChatId, int $messageId, array $data = null): CopyMessageMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->fromChatId = $fromChatId;
        $instance->messageId = $messageId;

        if (!empty($data)) {
            $instance->fill($data);
        }

        return $instance;
    }
}
