<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InputMessageContent;

/**
 * Class InputVenueMessageContent.
 *
 * @see https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
class InputVenueMessageContent extends InputMessageContentType
{
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
}
