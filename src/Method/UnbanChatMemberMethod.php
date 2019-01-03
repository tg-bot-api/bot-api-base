<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\UserIdVariableTrait;

/**
 * Class UnbanChatMemberMethod.
 *
 * @see https://core.telegram.org/bots/api#unbanchatmember
 */
class UnbanChatMemberMethod
{
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * @param int|string $chatId
     * @param int        $userId
     *
     * @return UnbanChatMemberMethod
     */
    public static function create($chatId, int $userId): UnbanChatMemberMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->userId = $userId;

        return $instance;
    }
}
