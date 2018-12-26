<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

/**
 * Class InputMediaAudioType.
 *
 * @see https://core.telegram.org/bots/api#inputmediaaudio
 */
class InputMediaAudioType extends InputMediaType
{
    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file,
     * so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using
     * multipart/form-data under <file_attach_name>.
     *
     * @var InputFileType|string|null
     */
    public $thumb;

    /**
     * Optional. Duration of the audio in seconds.
     *
     * @var int|null
     */
    public $duration;

    /**
     * Optional. Performer of the audio.
     *
     * @var string|null
     */
    public $performer;

    /**
     * Optional. Title of the audio.
     *
     * @var string|null
     */
    public $title;

    /**
     * InputMediaAudioType constructor.
     */
    public function __construct()
    {
        $this->type = self::TYPE_AUDIO;
    }
}
