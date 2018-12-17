<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


class VideoType
{
    /**
     * Unique identifier for this file.
     * @var String
     */
    public $fileId;

    /**
     * Video width as defined by sender.
     * @var Integer
     */
    public $width;

    /**
     * Video height as defined by sender.
     * @var Integer
     */
    public $height;

    /**
     * Duration of the video in seconds as defined by sender.
     * @var Integer
     */
    public $duration;

    /**
     * Optional. Video thumbnail.
     * @var PhotoSizeType
     */
    public $thumb;

    /**
     * Optional. Mime type of a file as defined by sender.
     * @var String
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var Integer
     */
    public $fileSize;

}