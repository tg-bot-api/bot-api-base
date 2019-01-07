<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

use TgBotApi\BotApiBase\Type\ForceReplyType;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardRemoveType;

/**
 * Trait EditVariablesTrait.
 */
trait EditMessageVariablesTrait
{
    /**
     * Required if inline_message_id is not specified.
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     *
     * @var int|string
     */
    public $chatId;

    /**
     * Optional. Required if inline_message_id is not specified. Identifier of the sent message.
     *
     * @var int|null
     */
    public $messageId;

    /**
     * Optional. Required if chat_id and message_id are not specified. Identifier of the inline message.
     *
     * @var string|null
     */
    public $inlineMessageId;

    /**
     * Optional. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     * instructions to remove reply keyboard or to force a reply from the user.
     *
     * @var InlineKeyboardMarkupType|ReplyKeyboardMarkupType|ReplyKeyboardRemoveType|ForceReplyType|null
     */
    public $replyMarkup;
}
