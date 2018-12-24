<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method\Traits;

use Greenplugin\TelegramBot\Type\ForceReplyType;
use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardRemoveType;

/**
 * Trait EditVariablesTrait
 */
trait EditMessageVariablesTrait
{
    /**
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @var integer|string|null
     */
    public $chatId;

    /**
     * Optional. Required if inline_message_id is not specified. Identifier of the sent message.
     *
     * @var integer|null
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
