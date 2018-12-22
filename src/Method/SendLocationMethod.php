<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class SendLocationMethod
 * @link https://core.telegram.org/bots/api#sendlocation
 */
class SendLocationMethod extends SendMethodAbstract
{
    /**
     * Latitude of the location.
     *
     * @var float
     */
    public $latitude;

    /**
     * Longitude of the location
     *
     * @var float
     */
    public $longitude;

    /**
     * Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
     *
     * @var integer|null
     */
    public $livePeriod;
}
