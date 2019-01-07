<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class CallbackGameType.
 *
 * @see https://core.telegram.org/bots/api#callbackgame
 */
class CallbackGameType
{
    //A placeholder, currently holds no information. Use BotFather to set up your game.

    /**
     * @return CallbackGameType
     */
    public static function create(): CallbackGameType
    {
        return new static();
    }
}
