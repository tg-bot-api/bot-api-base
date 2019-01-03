<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class UnpinChatMessageMethod.
 *
 * @see https://core.telegram.org/bots/api#unpinchatmessage
 */
class UnpinChatMessageMethod
{
    use ChatIdVariableTrait;

    /**
     * @param int|string $chatId
     *
     * @return UnpinChatMessageMethod
     */
    public static function create($chatId): UnpinChatMessageMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        return $instance;
    }
}
