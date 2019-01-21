<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\MethodInterface;

/**
 * Class GetWebhookInfoMethod.
 *
 * @see https://core.telegram.org/bots/api#getwebhookinfo
 */
class GetWebhookInfoMethod implements MethodInterface
{
    public static function create(): GetWebhookInfoMethod
    {
        return new static();
    }
}
