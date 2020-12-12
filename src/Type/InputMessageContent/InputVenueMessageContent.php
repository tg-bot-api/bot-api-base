<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMessageContent;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\Traits\GooglePlaceFieldsTrait;

/**
 * Class InputVenueMessageContent.
 *
 * @see https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
class InputVenueMessageContent extends InputMessageContentType
{
    use FillFromArrayTrait;
    use GooglePlaceFieldsTrait;

    /**
     * Latitude of the venue in degrees.
     *
     * @var float
     */
    public $latitude;

    /**
     * Longitude of the venue in degrees.
     *
     * @var float
     */
    public $longitude;

    /**
     * Name of the venue.
     *
     * @var string
     */
    public $title;

    /**
     * Address of the venue.
     *
     * @var string
     */
    public $address;

    /**
     * Optional. Foursquare identifier of the venue, if known.
     *
     * @var string|null
     */
    public $foursquareId;

    /**
     * Optional. Foursquare type of the venue, if known.
     * (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.).
     *
     * @var string|null
     */
    public $foursquareType;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        float $latitude,
        float $longitude,
        string $title,
        string $address,
        array $data = null
    ): InputVenueMessageContent {
        $instance = new static();
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        $instance->title = $title;
        $instance->address = $address;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
