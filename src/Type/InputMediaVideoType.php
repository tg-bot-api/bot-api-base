<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class InputMediaVideoType
 * @package Greenplugin\TelegramBot\Type
 */
class InputMediaVideoType extends InputMediaType
{
    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data
     * under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumb;

    /**
     * Optional. Video width
     * @var integer|null
     */
    public $width;

    /**
     * Optional. Video height
     * @var integer|null
     */
    public $height;

    /**
     * Optional. Video duration
     * @var integer|null
     */
    public $duration;

    /**
     * Optional. Pass True, if the uploaded video is suitable for streaming
     * @var boolean|null
     */
    public $supportStreaming;

    /**
     * InputMediaVideoType constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE_VIDEO;
    }
}