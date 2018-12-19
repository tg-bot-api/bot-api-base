<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class LocationType
 * @link https://core.telegram.org/bots/api#location
 */
class LocationType
{
    /**
     * Longitude as defined by sender.
     * @var Float
     */
    public $longitude;

    /**
     * Latitude as defined by sender
     * @var Float
     */
    public $latitude;
}