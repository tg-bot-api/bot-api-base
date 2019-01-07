<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

use TgBotApi\BotApiBase\Type\ForceReplyType;
use TgBotApi\BotApiBase\Type\InlineKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardRemoveType;

/**
 * Class ReplyMarkupVariableTrait.
 */
trait ReplyMarkupVariableTrait
{
    /**
     * Optional. Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard,
     * instructions to remove reply keyboard or to force a reply from the user.
     *
     * @var InlineKeyboardMarkupType|ReplyKeyboardMarkupType|ReplyKeyboardRemoveType|ForceReplyType|null
     */
    public $replyMarkup;
}
