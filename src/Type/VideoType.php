<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class VideoType.
 *
 * @see https://core.telegram.org/bots/api#video
 */
class VideoType
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
     * Video width as defined by sender.
     *
     * @var int
     */
    public $width;

    /**
     * Video height as defined by sender.
     *
     * @var int
     */
    public $height;

    /**
     * Duration of the video in seconds as defined by sender.
     *
     * @var int
     */
    public $duration;

    /**
     * Optional. Video thumbnail.
     *
     * @var PhotoSizeType|null
     */
    public $thumb;

    /**
     * Optional. Original filename as defined by sender.
     *
     * @var string|null
     */
    public $fileName;

    /**
     * Optional. Mime type of a file as defined by sender.
     *
     * @var string|null
     */
    public $mimeType;

    /**
     * Optional. File size.
     *
     * @var int|null
     */
    public $fileSize;
}
