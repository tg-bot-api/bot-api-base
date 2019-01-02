<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InputMedia;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class InputMediaPhotoType.
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhotoType extends InputMediaType
{
    use FillFromArrayTrait;

    /**
     * @param string|\SplFileInfo $media
     * @param array|null          $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
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
