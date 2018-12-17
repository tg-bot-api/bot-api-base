<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class AudioType
 * @link https://core.telegram.org/bots/api#audio
 */
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
     * @var String|null
     */
    public $performer;

    /**
     * Optional. Title of the audio as defined by sender or by audio tags.
     * @var String|null
     */
    public $title;

    /**
     * Optional. MIME type of the file as defined by sender.
     * @var String|null
     */
    public $mimeType;

    /**
     * Optional. File size
     * @var Integer|null
     */
    public $fileSize;

    /**
     * Optional. Thumbnail of the album cover to which the music file belongs
     * @var PhotoSizeType|null
     */
    public $thumb;


}