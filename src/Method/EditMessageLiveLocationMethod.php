<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageLiveLocationMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagelivelocation
 */
class EditMessageLiveLocationMethod implements EditMethodAliasInterface
{
    use EditMessageVariablesTrait;
    use FillFromArrayTrait;

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
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500.
     *
     * @var float|int|null
     */
    public $horizontalAccuracy;

    /**
     * Optional. Direction in which the user is moving, in degrees.
     * Must be between 1 and 360 if specified.
     *
     * @var int|null
     */
    public $heading;

    /**
     * Optional. Maximum distance for proximity alerts about
     * approaching another chat member, in meters.
     * Must be between 1 and 100000 if specified.
     *
     * @var int|null
     */
    public $proximityAlertRadius;

    /**
     * @param int|string $chatId
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(
        $chatId,
        int $messageId,
        float $latitude,
        float $longitude,
        array $data = null
    ): EditMessageLiveLocationMethod {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        if ($data) {
            $instance->fill($data, ['chatId', 'messageId', 'latitude', 'longitude', 'inlineMessageId']);
        }

        return $instance;
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function createInline(
        string $inlineMessageId,
        float $latitude,
        float $longitude,
        array $data = null
    ): EditMessageLiveLocationMethod {
        $instance = new static();
        $instance->latitude = $latitude;
        $instance->longitude = $longitude;
        $instance->inlineMessageId = $inlineMessageId;
        if ($data) {
            $instance->fill($data, ['chatId', 'latitude', 'longitude', 'inlineMessageId']);
        }

        return $instance;
    }
}
