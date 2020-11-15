<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class DeleteWebhookMethod.
 *
 * @see https://core.telegram.org/bots/api#deletewebhook
 */
class DeleteWebhookMethod implements DeleteMethodAliasInterface
{
    use FillFromArrayTrait;

    /**
     * Pass True to drop all pending updates.
     *
     * @var bool|null
     */
    public $dropPendingUpdates;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(array $data = null): DeleteWebhookMethod
    {
        $instance = new static();

        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
