<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class AnimationType
 * @link https://core.telegram.org/bots/api#animation
 */
class AnimationType
{
    /**
     * Unique file identifier.
     * @var string
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
     * @var string|null
     */
    public $fileName;

    /**
     * Optional. MIME type of the file as defined by sender.
     * @var string|null
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var Integer|null
     */
    public $fileSize;

}