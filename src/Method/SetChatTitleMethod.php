<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class SetChatTitleMethod.
 *
 * @see https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleMethod implements SetMethodAliasInterface
{
    use ChatIdVariableTrait;

    /**
     * New chat title, 1-255 characters.
     *
     * @var string
     */
    public $title;

    /**
     * @param int|string $chatId
     * @param string     $title
     *
     * @return SetChatTitleMethod
     */
    public static function create($chatId, string $title): SetChatTitleMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->title = $title;

        return $instance;
    }
}
