<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class UnpinChatMessageMethod
 * @link https://core.telegram.org/bots/api#unpinchatmessage
 */
class UnpinChatMessageMethod
{
    use ChatIdVariableTrait;

    /**
     * UnbanChatMemberMethod constructor.
     * @param int|string $chatId
     */
    public function __construct($chatId)
    {
        $this->chatId = $chatId;
    }
}
