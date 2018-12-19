<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class PhotoSizeType
 * @link https://core.telegram.org/bots/api#photosize
 */
class PhotoSizeType
{
    /**
     * Unique identifier for this file.
     * @var string
     */
    public $fileId;

    /**
     * Photo width.
     * @var integer
     */
    public $width;

    /**
     * Photo height
     * @var integer
     */
    public $height;

    /**
     * Optional. File size.
     * @var integer|null
     */
    public $fileSize;
}