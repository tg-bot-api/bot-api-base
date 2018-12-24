<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;
use Greenplugin\TelegramBot\Method\Traits\UserIdVariableTrait;

/**
 * Class GetChatMemberMethod
 * @link https://core.telegram.org/bots/api#getchatmember
 */
class GetChatMemberMethod
{
    use ChatIdVariableTrait;
    use UserIdVariableTrait;

    /**
     * @param integer|string $chatId
     * @param int $userId
     */
    public function __construct($chatId, int $userId)
    {
        $this->chatId = $chatId;
        $this->userId = $userId;
    }
}
