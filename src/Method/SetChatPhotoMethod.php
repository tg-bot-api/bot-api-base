<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\SetMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class SetChatPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoMethod implements SetMethodAliasInterface
{
    use ChatIdVariableTrait;
    /**
     * New chat photo, uploaded using multipart/form-data.
     *
     * @var InputFileType
     */
    public $photo;

    /**
     * @param int|string    $chatId
     * @param InputFileType $photo
     *
     * @return SetChatPhotoMethod
     */
    public static function create($chatId, InputFileType $photo): SetChatPhotoMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->photo = $photo;

        return $instance;
    }
}
