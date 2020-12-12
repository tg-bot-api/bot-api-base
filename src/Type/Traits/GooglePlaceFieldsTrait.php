<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\Traits;

trait GooglePlaceFieldsTrait
{
    /**
     * Optional. Google Places identifier of the venue.
     *
     * @var string|null
     *
     * @see https://developers.google.com/places/web-service/place-id
     */
    public $googlePlaceId;

    /**
     * Optional. Google Places type of the venue.
     *
     * @var string|null
     *
     * @see https://developers.google.com/places/web-service/supported_types
     */
    public $googlePlaceType;
}
