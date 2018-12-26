<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendLocationMethod.
 *
 * @see https://core.telegram.org/bots/api#sendlocation
 */
class SendLocationMethod
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Latitude of the location.
     *
     * @var float
     */
    public $latitude;

    /**
     * Longitude of the location.
     *
     * @var float
     */
    public $longitude;

    /**
     * Period in seconds for which the location will be updated (see Live Locations, should be between 60 and 86400.
     *
     * @var int|null
     */
    public $livePeriod;

    /**
     * SendGroupMethod constructor.
     *
     * @param int|string $chatId
     * @param float      $latitude
     * @param float      $longitude
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, float $latitude, float $longitude, array $data = null)
    {
        $this->chatId = $chatId;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        if ($data) {
            $this->fill($data);
        }
    }
}
