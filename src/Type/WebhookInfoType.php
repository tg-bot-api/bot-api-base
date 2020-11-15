<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class WebhookInfoType.
 *
 * @see https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfoType
{
    /**
     * Webhook URL, may be empty if webhook is not set up.
     *
     * @var string;
     */
    public $url;

    /**
     * True, if a custom certificate was provided for webhook certificate checks.
     *
     * @var bool
     */
    public $hasCustomCertificate;

    /**
     * Number of updates awaiting delivery.
     *
     * @var int
     */
    public $pendingUpdateCount;

    /**
     * Optional. Currently used webhook IP address.
     *
     * @var string|null
     */
    public $ipAddress;

    /**
     * Optional. DateTimeImmutable for the most recent error that happened when trying to deliver an update via webhook.
     *
     * @var \DateTimeImmutable|null
     */
    public $lastErrorDate;

    /**
     * Optional. Error message in human-readable format for the most recent error that happened
     * when trying to deliver an update via webhook.
     *
     * @var string|null
     */
    public $lastErrorMessage;

    /**
     * Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery.
     *
     * @var int|null
     */
    public $maxConnections;

    /**
     * Optional. A list of update types the bot is subscribed to. Defaults to all update types.
     *
     * @var string[]|null
     */
    public $allowedUpdates;
}
