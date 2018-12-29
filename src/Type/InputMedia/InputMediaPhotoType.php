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
     * InputMediaPhotoType constructor.
     *
     * @param $media
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($media, array $data = null)
    {
        $this->type = self::TYPE_PHOTO;
        $this->media = $media;
        if ($data) {
            $this->fill($data);
        }
    }
}
