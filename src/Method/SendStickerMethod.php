<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Method\Traits\SendToChatVariablesTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SendStickerMethod.
 *
 * @see https://core.telegram.org/bots/api#sendsticker
 */
class SendStickerMethod
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Sticker to send.
     * Pass a file_id as String to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a .webp file from the Internet,
     * or upload a new one using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $sticker;

    /**
     * @param int|string           $chatId
     * @param InputFileType|string $sticker
     * @param array|null           $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return SendStickerMethod
     */
    public static function create($chatId, $sticker, array $data = null): SendStickerMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->sticker = $sticker;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
