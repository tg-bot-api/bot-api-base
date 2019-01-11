<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\DeleteMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\ChatIdVariableTrait;

/**
 * Class DeleteChatPhotoMethod.
 *
 * @see https://core.telegram.org/bots/api#deletechatphoto
 */
class DeleteChatPhotoMethod implements DeleteMethodAliasInterface
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
