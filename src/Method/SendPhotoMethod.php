<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\CaptionVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#sendphoto
 */
class SendPhotoMethod implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;

    /**
     * Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a photo from the Internet,
     * or upload a new photo using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $photo;

    /**
     * SendPhotoMethod constructor.
     *
     * @param int|string           $chatId
     * @param InputFileType|string $photo
     * @param array|null           $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, $photo, array $data = null)
    {
        $this->chatId = $chatId;
        $this->photo = $photo;
        if ($data) {
            $this->fill($data);
        }
    }
}
