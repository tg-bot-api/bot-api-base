<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class DeleteChatPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#deletechatphoto
 */
class DeleteChatPhotoMethod
{
    use ChatIdVariableTrait;

    /**
     * @param int|string $chatId
     *
     * @return DeleteChatPhotoMethod
     */
    public static function create($chatId): DeleteChatPhotoMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        return $instance;
    }
}
