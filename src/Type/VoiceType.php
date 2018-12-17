<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;


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
     * @var String
     */
    public $mimeType;

    /**
     * Optional. File size.
     * @var Integer
     */
    public $fileSize;
}