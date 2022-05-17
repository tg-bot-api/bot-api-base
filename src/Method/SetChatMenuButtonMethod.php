<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\MenuButtonType;

/**
 * Class SetChatMenuButtonMethod.
 *
 * Use this method to change the bot's menu button in a private chat, or the default menu button.
 * Returns True on success.
 *
 * @see https://core.telegram.org/bots/api#setchatmenubutton
 */
class SetChatMenuButtonMethod implements SetMethodAliasInterface
{
    use FillFromArrayTrait;

    /**
     * Unique identifier for the target private chat. If not specified, default bot's menu
     * button will be changed
     *
     * @var integer|null
     */
    public $chatId;

    /**
     * Optional. A JSON-serialized object for the bot's new menu button.
     * Defaults to 'default' type
     *
     * @var MenuButtonType|null
     */
    public $menuButton;


    /**
     * SetChatMenuButtonMethod constructor.
     *
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SetChatMenuButtonMethod
     */
    public static function create(array $data = null): SetChatMenuButtonMethod
    {
        $instance = new static();
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
