<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Type\ForceReplyType;
use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardRemoveType;

abstract class SendMethodAbstract
{
    /**
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @var integer|string
     */
    public $chatId;

    /**
     * Optional. Sends the message silently. Users will receive a notification with no sound.
     *
     * @var boolean|null
     */
    public $disableNotification;

    /**
     * Optional. If the message is a reply, ID of the original message.
     *
     * @var integer|null
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
