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
     * UnbanChatMemberMethod constructor.
     *
     * @param int|string $chatId
     * @param int        $userId
     */
    public function __construct($chatId, int $userId)
    {
        $this->chatId = $chatId;
        $this->userId = $userId;
    }
}
