<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method\Traits;

use Greenplugin\TelegramBot\Type\ForceReplyType;
use Greenplugin\TelegramBot\Type\InlineKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardMarkupType;
use Greenplugin\TelegramBot\Type\ReplyKeyboardRemoveType;

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
