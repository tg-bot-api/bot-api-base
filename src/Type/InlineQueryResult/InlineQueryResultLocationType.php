<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultLocationType.
 *
 * Represents a location on a map. By default, the location will be sent by the user.
 * Alternatively, you can use input_message_content to send a message
 * with the specified content instead of the location.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
class InlineQueryResultLocationType extends InlineQueryResultType
{
    use FillFromArrayTrait;

    /**
     * Location latitude in degrees.
     *
     * @var float
     */
    public $latitude;

    /**
     * Location longitude in degrees.
     *
     * @var float
     */
    public $longitude;

    /**
     * Location title.
     *
     * @var string
     */
    public $title;

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
     * Optional. For live locations, a maximum distance for proximity alerts a
     * bout approaching another chat member, in meters. Must be between 1 and 100000 if specified.
     *
     * @var int|null
     */
    public $proximityAlertRadius;

    /**
     * Optional. Content of the message to be sent instead of the location.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * Optional. Url of the thumbnail for the result.
     *
     * @var string|null
     */
    public $thumbUrl;

    /**
     * Optional. Thumbnail width.
     *
     * @var int|null
     */
    public $thumbWidth;

    /**
     * Optional. Thumbnail height.
     *
     * @var int|null
     */
    public $thumbHeight;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        string $id,
        float $latitude,
        float $longitude,
        string $title,
        array $data = null
    ): InlineQueryResultLocationType {
        $instance = new static();
        $instance->type = static::TYPE_LOCATION;
        $instance->id = $id;
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        $instance->title = $title;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
