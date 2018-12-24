<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\CaptionVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendVoiceMethod
 * @link https://core.telegram.org/bots/api#sendvoice
 */
class SendVoiceMethod implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;

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

    /**
     * SendVoiceMethod constructor.
     * @param int|string $chatId
     * @param InputFileType|string $voice
     * @param array|null $data
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, $voice, array $data = null)
    {
        $this->chatId = $chatId;
        $this->voice = $voice;
        if ($data) {
            $this->fill($data);
        }
    }
}
