<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendStickerMethod.
 *
 * @see https://core.telegram.org/bots/api#sendsticker
 */
class SendStickerMethod implements SendMethodAliasInterface
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
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
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
