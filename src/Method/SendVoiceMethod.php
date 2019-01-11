<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\CaptionVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SendVoiceMethod.
 *
 * @see https://core.telegram.org/bots/api#sendvoice
 */
class SendVoiceMethod implements HasParseModeVariableInterface, SendMethodAliasInterface
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
     * @param int|string           $chatId
     * @param InputFileType|string $voice
     * @param array|null           $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return SendVoiceMethod
     */
    public static function create($chatId, $voice, array $data = null): SendVoiceMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->voice = $voice;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
