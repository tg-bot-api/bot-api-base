<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetMyCommandsMethod.
 *
 * Use this method to get the current list of the bot's commands.
 * Requires no parameters. Returns Array of BotCommandType on success.
 *
 * @see https://core.telegram.org/bots/api#getmycommands
 */
class GetMyCommandsMethod implements MethodInterface
{
    public static function create(): GetMyCommandsMethod
    {
        return new static();
    }
}
