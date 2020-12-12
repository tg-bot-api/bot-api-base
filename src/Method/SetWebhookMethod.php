<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasUpdateTypeVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SetWebhookMethod.
 *
 * @see https://core.telegram.org/bots/api#setwebhook
 * @see https://core.telegram.org/bots/webhooks
 */
class SetWebhookMethod implements HasUpdateTypeVariableInterface, SetMethodAliasInterface
{
    use FillFromArrayTrait;

    /**
     * HTTPS url to send updates to. Use an empty string to remove webhook integration.
     *
     * @var string
     */
    public $url;

    /**
     * Optional. Upload your public key certificate so that the root certificate in use can be checked.
     *
     * @see https://core.telegram.org/bots/self-signed
     *
     * @var InputFileType|null
     */
    public $certificate;

    /**
     * The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS.
     *
     * @var string | null
     */
    public $ipAddress;

    /**
     * Optional    Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100.
     * Defaults to 40. Use lower values to limit the load on your bot‘s server,
     * and higher values to increase your bot’s throughput.
     *
     * @var int|null
     */
    public $maxConnections;

    /**
     * Optional    List the types of updates you want your bot to receive.
     * For example, specify [“message”, “edited_channel_post”, “callback_query”] to only receive updates of these types.
     * See Update for a complete list of available update types.
     * Specify an empty list to receive all updates regardless of type (default).
     * If not specified, the previous setting will be used.
     *
     * Please note that this parameter doesn't affect updates created before the call to the setWebhook,
     * so unwanted updates may be received for a short period of time.
     *
     * @var string[]|null
     */
    public $allowedUpdates;

    /**
     * Pass True to drop all pending updates.
     *
     * @var bool|null
     */
    public $dropPendingUpdates;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $url, array $data = null): SetWebhookMethod
    {
        $instance = new static();
        $instance->url = $url;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
