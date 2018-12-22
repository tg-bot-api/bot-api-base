<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;


use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendVoiceMethod
 * @link https://core.telegram.org/bots/api#sendvoice
 */
class SendVoiceMethod extends SendWithCaptionMethodAbstract
{
    /**
     * Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a file from the Internet,
     * or upload a new one using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $voice;

    /**
     * Optional Duration of the voice message in seconds.
     *
     * @var string|null
     */
    public $duration;
}
