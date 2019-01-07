<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

/**
 * Class GetWebhookInfoMethod.
 *
 * @see https://core.telegram.org/bots/api#getwebhookinfo
 */
class GetWebhookInfoMethod
{
    public static function create(): GetWebhookInfoMethod
    {
        return new static();
    }
}
