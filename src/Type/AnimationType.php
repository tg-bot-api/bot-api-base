<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


class AnimationType
{
    /**
     * Unique file identifier.
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
     * Animation thumbnail as defined by sender
     * @var PhotoSizeType
     */
    public $thumb;

    /**
     * Optional. Original animation filename as defined by sender.
     * @var String
     */
    public $fileName;

    /**
     * Optional. MIME type of the file as defined by sender.
     * @var String
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var Integer
     */
    public $fileSize;

}