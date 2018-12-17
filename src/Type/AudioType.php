<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


class AudioType
{
    /**
     * Unique identifier for this file
     * @var String
     */
    public $fileId;

    /**
     * Duration of the audio in seconds as defined by sender
     * @var Integer
     */
    public $duration;

    /**
     * Optional. Performer of the audio as defined by sender or by audio tags.
     * @var String
     */
    public $performer;

    /**
     * Optional. Title of the audio as defined by sender or by audio tags.
     * @var String
     */
    public $title;

    /**
     * Optional. MIME type of the file as defined by sender.
     * @var String
     */
    public $mimeType;

    /**
     * Optional. File size
     * @var Integer
     */
    public $fileSize;

    /**
     * Optional. Thumbnail of the album cover to which the music file belongs
     * @var PhotoSizeType
     */
    public $thumb;


}