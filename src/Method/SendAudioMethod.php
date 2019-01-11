<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\CaptionVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendAudioMethod.
 *
 * @see https://core.telegram.org/bots/api#sendaudio
 */
class SendAudioMethod implements SendMethodAliasInterface
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
     * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files.
     *
     * @var InputFileType|string|null
     */
    public $thumb;

    /**
     * @param int|string           $chatId
     * @param InputFileType|string $audio
     * @param array|null           $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SendAudioMethod
     */
    public static function create($chatId, $audio, array $data = null): SendAudioMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->audio = $audio;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
