<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\UserIdVariableTrait;

/**
 * Class GetChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#getchatmember
 */
class GetChatMemberMethod
{
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * @param int|string $chatId
     * @param int        $userId
     *
     * @return GetChatMemberMethod
     */
    public static function create($chatId, int $userId): GetChatMemberMethod
    {
        $instance = new self();
        $instance->chatId = $chatId;
        $instance->userId = $userId;

        return $instance;
    }
}
