<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendVenueMethod.
 */
class SendVenueMethod
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Latitude of the venue.
     *
     * @var float
     */
    public $latitude;

    /**
     * Longitude of the venue.
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
     * Optional. Foursquare identifier of the venue.
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
     * @param int|string $chatId
     * @param float      $latitude
     * @param float      $longitude
     * @param string     $title
     * @param string     $address
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SendVenueMethod
     */
    public static function create(
        $chatId,
        float $latitude,
        float $longitude,
        string $title,
        $address,
        array $data = null
    ): SendVenueMethod {
        $instance = new static();
        $instance->chatId = $chatId;
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
