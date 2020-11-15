<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendLocationMethod.
 *
 * @see https://core.telegram.org/bots/api#sendlocation
 */
class SendLocationMethod implements SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Latitude of the location.
     *
     * @var float
     */
    public $latitude;

    /**
     * Longitude of the location.
     *
     * @var float
     */
    public $longitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500.
     *
     * @var float|int|null
     */
    public $horizontalAccuracy;

    /**
     * Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
     *
     * @var int|null
     */
    public $livePeriod;

    /**
     * Optional. For live locations, a direction in which the user is moving, in degrees.
     * Must be between 1 and 360 if specified.
     *
     * @var int|null
     */
    public $heading;

    /**
     * Optional. For live locations, a maximum distance
     * for proximity alerts about approaching another chat member, in meters.
     * Must be between 1 and 100000 if specified.
     *
     * @var int|null
     */
    public $proximityAlertRadius;

    /**
     * @param int|string $chatId
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create($chatId, float $latitude, float $longitude, array $data = null): SendLocationMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
