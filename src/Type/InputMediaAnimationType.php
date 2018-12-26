<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

/**
 * Class InputMediaAnimationType.
 *
 * @see https://core.telegram.org/bots/api#inputmediaanimation
 */
class InputMediaAnimationType extends InputMediaType
{
    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using
     * multipart/form-data under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumb;

    /**
     * Optional. Animation width.
     *
     * @var int|null
     */
    public $width;

    /**
     * Optional. Animation height.
     *
     * @var int|null
     */
    public $height;

    /**
     * Optional. Animation duration.
     *
     * @var int|null
     */
    public $duration;

    /**
     * InputMediaAnimationType constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE_ANIMATION;
    }
}
