<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\AddMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\EmojisVariableTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MaskPositionType;

/**
 * Class AddStickerToSetMethod.
 *
 * @see https://core.telegram.org/bots/api#addstickertoset
 */
class AddStickerToSetMethod implements AddMethodAliasInterface
{
    use FillFromArrayTrait;
    use EmojisVariableTrait;
    /**
     * User identifier of sticker set owner.
     *
     * @var int
     */
    public $userId;

    /**
     * Sticker set name.
     *
     * @var string
     */
    public $name;

    /**
     * Png image with the sticker, must be up to 512 kilobytes in size,
     * dimensions must not exceed 512px, and either width or height must be exactly 512px.
     * Pass a file_id as a String to send a file that already exists on the Telegram servers,
     * pass an HTTP URL as a String for Telegram to get a file from the Internet,
     * or upload a new one using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $pngSticker;

    /**
     * Optional. A JSON-serialized object for position where the mask should be placed on faces.
     *
     * @var MaskPositionType|null
     */
    public $maskPosition;

    /**
     * @param int                  $userId
     * @param string               $name
     * @param InputFileType|string $pngSticker
     * @param string               $emojis
     * @param array|null           $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return AddStickerToSetMethod
     */
    public static function create(
        int $userId,
        string $name,
        $pngSticker,
        string $emojis,
        array $data = null
    ): AddStickerToSetMethod {
        $instance = new static();
        $instance->userId = $userId;
        $instance->name = $name;
        $instance->pngSticker = $pngSticker;
        $instance->emojis = $emojis;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
