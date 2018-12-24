<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatMembersCountMethod
 * @link https://core.telegram.org/bots/api#getchatmemberscount
 */
class GetChatMembersCountMethod
{
    use ChatIdVariableTrait;

    /**
     * @param integer|string $chatId
     */
    public function __construct($chatId)
    {
        $this->chatId = $chatId;
    }
}
