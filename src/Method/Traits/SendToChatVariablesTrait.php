<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

use TgBotApi\BotApiBase\Type\ForceReplyType;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardRemoveType;

// + sendMessage, 1
// + sendPhoto, 2 -
// + sendVideo, 3 -
// + sendAnimation, 4 -
// + sendAudio, 5 -
// + sendDocument, 6 -
// + sendSticker, 7 -
// + sendVideoNote, 8 -
// + sendVoice, 9 -
// + sendLocation, 10 -
// + sendVenue, 11 -
// + sendContact, 12 -
// + sendPoll, 13 -
// + sendDice, 14 -
// + sendInvoice, 15 -
// + sendGame, 16 -
// + sendMediaGroup 17 -

trait SendToChatVariablesTrait
{
    use ChatIdVariableTrait;

    /**
     * Optional. Sends the message silently. Users will receive a notification with no sound.
     *
     * @var bool|null
     */
    public $disableNotification;

    /**
     * Optional. Pass True, if the message should be sent even if the specified replied-to message is not found.
     *
     * @var bool|null
     */
    public $allowSendingWithoutReply;

    /**
     * Optional. If the message is a reply, ID of the original message.
     *
     * @var int|null
     */
    public $replyToMessageId;

    /**
     * Optional. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     * instructions to remove reply keyboard or to force a reply from the user.
     *
     * @var InlineKeyboardMarkupType|ReplyKeyboardMarkupType|ReplyKeyboardRemoveType|ForceReplyType|null
     */
    public $replyMarkup;
}
