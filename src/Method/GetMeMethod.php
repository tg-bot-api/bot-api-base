<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

/**
 * Class GetMeMethod.
 *
 * @see https://core.telegram.org/bots/api#getme
 */
class GetMeMethod
{
    public static function create(): GetMeMethod
    {
        return new static();
    }
}
