<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMessageContent;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputLocationMessageContentType.
 *
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContentType extends InputMessageContentType
{
    use FillFromArrayTrait;

    /**
     * Latitude of the location in degrees.
     *
     * @var float
     */
    public $latitude;

    /**
     * Longitude of the location in degrees.
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
     * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
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
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        float $latitude,
        float $longitude,
        array $data = null
    ): InputLocationMessageContentType {
        $instance = new static();
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
