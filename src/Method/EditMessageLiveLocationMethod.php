<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class EditMessageLiveLocationMethod
 * @link https://core.telegram.org/bots/api#editmessagelivelocation
 */
class EditMessageLiveLocationMethod extends EditMethodAbstract
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
}
