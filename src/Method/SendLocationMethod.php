<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;

/**
 * Class SendLocationMethod.
 *
 * @see https://core.telegram.org/bots/api#sendlocation
 */
class SendLocationMethod implements SendMethodAliasInterface
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
     * @param int|string $chatId
     * @param float      $latitude
     * @param float      $longitude
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SendLocationMethod
     */
    public static function create($chatId, float $latitude, float $longitude, array $data = null): SendLocationMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
