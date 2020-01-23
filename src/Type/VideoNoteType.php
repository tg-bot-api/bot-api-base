<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class VideoNoteType.
 *
 * @see https://core.telegram.org/bots/api#videonote
 */
class VideoNoteType
{
    /**
     * Unique identifier for this file.
     *
     * @var string
     */
    public $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     *
     * @var string
     */
    public $fileUniqueId;

    /**
     * Video width and height (diameter of the video message) as defined by sender.
     *
     * @var int
     */
    public $length;

    /**
     * Duration of the video in seconds as defined by sender.
     *
     * @var int
     */
    public $duration;

    /**
     * Optional. Video thumbnailю.
     *
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Optional. File size.
     *
     * @var int|null
     */
    public $fileSize;
}
