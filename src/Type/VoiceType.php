<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


/**
 * Class VoiceType
 * @see https://core.telegram.org/bots/api#voice
 */
class VoiceType
{
    /**
     * Unique identifier for this file.
     * @var String
     */
    public $fileId;

    /**
     * Duration of the audio in seconds as defined by sender
     * @var Integer
     */
    public $duration;

    /**
     * Optional. MIME type of the file as defined by sender.
     * @var String|null
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var Integer|null
     */
    public $fileSize;
}