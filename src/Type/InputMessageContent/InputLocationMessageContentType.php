<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InputMessageContent;

/**
 * Class InputLocationMessageContentType.
 *
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContentType extends InputMessageContentType
{
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
     * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
     *
     * @var int|null
     */
    public $livePeriod;
}
