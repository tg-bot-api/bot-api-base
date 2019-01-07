<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

/**
 * Class DeleteWebhookMethod.
 *
 * @see https://core.telegram.org/bots/api#deletewebhook
 */
class DeleteWebhookMethod
{
    /**
     * @return DeleteWebhookMethod
     */
    public static function create(): DeleteWebhookMethod
    {
        return new static();
    }
}
