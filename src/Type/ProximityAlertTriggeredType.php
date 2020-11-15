<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * This object represents the content of a service message,
 * sent whenever a user in the chat triggers
 * a proximity alert set by another user.
 *
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 */
class ProximityAlertTriggeredType
{
    /**
     * User that triggered the alert.
     *
     * @var UserType
     */
    public $traveler;

    /**
     * User that set the alert.
     *
     * @var UserType
     */
    public $watcher;

    /**
     * The distance between the users.
     *
     * @var int
     */
    public $distance;
}
