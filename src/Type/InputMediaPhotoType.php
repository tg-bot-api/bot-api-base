<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

/**
 * Class InputMediaPhotoType.
 *
 * @see https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhotoType extends InputMediaType
{
    /**
     * InputMediaPhotoType constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE_PHOTO;
    }
}
