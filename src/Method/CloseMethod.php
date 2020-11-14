<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Use this method to close the bot instance before moving it from one local server to another.
 * You need to delete the webhook before calling this method to ensure that the bot isn't
 * launched again after server restart. The method will return error 429 in the first 10 minutes
 * after the bot is launched. Returns True on success.
 * Requires no parameters.
 *
 * @see https://core.telegram.org/bots/api#close
 */
class CloseMethod implements MethodInterface
{
    public static function create(): CloseMethod
    {
        return new static();
    }
}
