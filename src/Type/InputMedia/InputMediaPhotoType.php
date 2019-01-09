<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMedia;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class InputMediaPhotoType.
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhotoType extends InputMediaType
{
    use FillFromArrayTrait;

    /**
     * @param string|InputFileType $media
     * @param array|null           $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return InputMediaPhotoType
     */
    public static function create($media, array $data = null): InputMediaPhotoType
    {
        $instance = new static();
        $instance->media = $media;
        $instance->type = static::TYPE_PHOTO;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
