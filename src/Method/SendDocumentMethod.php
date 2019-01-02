<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\CaptionVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendDocumentMethod.
 *
 * @see https://core.telegram.org/bots/api#senddocument
 */
class SendDocumentMethod implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;
    /**
     * File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a file from the Internet,
     * or upload a new one using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $document;

    /**
     * Optional. Thumbnail of the file sent. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail‘s width and height should not exceed 90.
     * Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can’t be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>”
     * if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More info on Sending Files ».
     *
     * @var InputFileType|string|null
     */
    public $thumb;

    /**
     * @param int|string           $chatId
     * @param InputFileType|string $document
     * @param array|null           $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return SendDocumentMethod
     */
    public static function create($chatId, $document, array $data = null): SendDocumentMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->document = $document;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
