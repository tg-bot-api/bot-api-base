<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Type\InputFileType;

/**
 * Class SetChatPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoMethod
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
