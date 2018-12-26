<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\EditMessageVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageLiveLocationMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagelivelocation
 */
class EditMessageLiveLocationMethod
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
     * @param float      $latitude
     * @param float      $longitude
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(float $latitude, float $longitude, array $data = null)
    {
        $this->$latitude = $latitude;
        $this->longitude = $longitude;
        if ($data) {
            $this->fill($data);
        }
    }

    /**
     * @param int|string $chatId
     * @param float      $latitude
     * @param float      $longitude
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageLiveLocationMethod
     */
    public static function create(
        $chatId,
        float $latitude,
        float $longitude,
        array $data = null
    ): EditMessageLiveLocationMethod {
        $method = new self($latitude, $longitude, $data);
        $method->chatId = $chatId;

        return $method;
    }

    /**
     * @param string     $inlineMessageId
     * @param float      $latitude
     * @param float      $longitude
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageLiveLocationMethod
     */
    public static function createInline(
        string $inlineMessageId,
        float $latitude,
        float $longitude,
        array $data = null
    ): EditMessageLiveLocationMethod {
        $method = new self($latitude, $longitude, $data);
        $method->inlineMessageId = $inlineMessageId;

        return $method;
    }
}
