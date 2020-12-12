<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class LocationType.
 *
 * @see https://core.telegram.org/bots/api#location
 */
class LocationType
{
    /**
     * Longitude as defined by sender.
     *
     * @var float
     */
    public $longitude;

    /**
     * Latitude as defined by sender.
     *
     * @var float
     */
    public $latitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500.
     *
     * @var float|int|null
     */
    public $horizontalAccuracy;

    /**
     * Optional. Time relative to the message sending date, during which the location can be updated, in seconds.
     * For active live locations only.
     *
     * @var int|null
     */
    public $livePeriod;

    /**
     * Optional. The direction in which user is moving, in degrees; 1-360.
     * For active live locations only.
     *
     * @var int|null
     */
    public $heading;

    /**
     * Optional. Maximum distance for proximity alerts about approaching another chat member, in meters.
     * For sent live locations only.
     *
     * @var int|null
     */
    public $proximityAlertRadius;
}
