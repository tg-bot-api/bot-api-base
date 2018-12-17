<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class VideoNoteType
 * @see https://core.telegram.org/bots/api#videonote
 */
class VideoNoteType
{
    /**
     * Unique identifier for this file
     * @var String
     */
    public $fileId;

    /**
     * Video width and height (diameter of the video message) as defined by sender
     * @var Integer
     */
    public $length;

    /**
     * Duration of the video in seconds as defined by sender.
     * @var Integer
     */
    public $duration;

    /**
     * Optional. Video thumbnailю
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Optional. File size.
     * @var Integer|null
     */
    public $fileSize;

}