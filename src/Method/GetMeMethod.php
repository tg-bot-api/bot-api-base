<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetMeMethod.
 *
 * @see https://core.telegram.org/bots/api#getme
 */
class GetMeMethod implements MethodInterface
{
    public static function create(): GetMeMethod
    {
        return new static();
    }
}
