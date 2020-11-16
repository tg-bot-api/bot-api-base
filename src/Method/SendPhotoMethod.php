<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\CaptionVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class SendPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#sendphoto
 */
class SendPhotoMethod implements HasParseModeVariableInterface, SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;
    use CaptionVariablesTrait;
    use CaptionEntitiesFieldTrait;

    /**
     * Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended),
     * pass an HTTP URL as a String for Telegram to get a photo from the Internet,
     * or upload a new photo using multipart/form-data.
     *
     * @var InputFileType|string
     */
    public $photo;

    /**
     * @param int|string           $chatId
     * @param InputFileType|string $photo
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create($chatId, $photo, array $data = null): SendPhotoMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->photo = $photo;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
