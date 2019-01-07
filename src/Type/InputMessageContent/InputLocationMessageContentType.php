<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMessageContent;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InputLocationMessageContentType.
 *
 * @see https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContentType extends InputMessageContentType
{
    use FillFromArrayTrait;
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

    /**
     * @param float      $latitude
     * @param float      $longitude
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return InputLocationMessageContentType
     */
    public static function create(
        float $latitude,
        float $longitude,
        array $data = null
    ): InputLocationMessageContentType {
        $instance = new static();
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
