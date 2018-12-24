<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\CaptionVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendAudioMethod
 * @link https://core.telegram.org/bots/api#sendaudio
 */
class SendAudioMethod
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;
    /**
     * Audio file to send.
     * Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get an audio file from the Internet,
     * or upload a new one using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $audio;

    /**
     * Optional Duration of the audio in seconds.
     *
     * @var string|null
     */
    public $duration;

    /**
     * Optional. Performer.
     *
     * @var string|null
     */
    public $performer;

    /**
     * Optional. Track name.
     *
     * @var string|null
     */
    public $title;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>”
     * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files
     *
     * @var InputFileType|string|null
     */
    public $thumb;

    /**
     * SendAnimationMethod constructor.
     * @param integer|string $chatId
     * @param InputFileType|string $audio
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, $audio, array $data = null)
    {
        $this->chatId = $chatId;
        $this->audio = $audio;
        if ($data) {
            $this->fill($data);
        }
    }
}
