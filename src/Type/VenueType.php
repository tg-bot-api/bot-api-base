<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Type\Traits\GooglePlaceFieldsTrait;

/**
 * Class VenueType.
 *
 * @see https://core.telegram.org/bots/api#venue
 */
class VenueType
{
    use GooglePlaceFieldsTrait;

    /**
     * Venue location.
     *
     * @var LocationType
     */
    public $location;

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
     * Optional. Foursquare identifier of the venue.
     *
     * @var string|null
     */
    public $foursquareId;

    /**
     * Optional. Foursquare type of the venue.
     * (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.).
     *
     * @var string|null
     */
    public $foursquareType;
}
