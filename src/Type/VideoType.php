<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class VideoType
 * @link https://core.telegram.org/bots/api#video
 */
class VideoType
{
    /**
     * Unique identifier for this file.
     * @var string
     */
    public $fileId;

    /**
     * Video width as defined by sender.
     * @var integer
     */
    public $width;

    /**
     * Video height as defined by sender.
     * @var integer
     */
    public $height;

    /**
     * Duration of the video in seconds as defined by sender.
     * @var integer
     */
    public $duration;

    /**
     * Optional. Video thumbnail.
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Optional. Mime type of a file as defined by sender.
     * @var string|null
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var integer|null
     */
    public $fileSize;

}