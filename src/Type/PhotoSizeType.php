<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


class PhotoSizeType
{
    /**
     * Unique identifier for this file.
     * @var String
     */
    public $fileId;

    /**
     * Photo width.
     * @var Integer
     */
    public $width;

    /**
     * Photo height
     * @var Integer
     */
    public $height;

    /**
     * Optional. File size.
     * @var Integer
     */
    public $fileSize;
}