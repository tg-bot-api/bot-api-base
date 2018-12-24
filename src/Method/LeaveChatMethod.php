<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class LeaveChatMethod
 * @link https://core.telegram.org/bots/api#leavechat
 */
class LeaveChatMethod
{
    use ChatIdVariableTrait;

    /**
     * LeaveChatMethod constructor.
     * @param integer|string
     */
    public function __construct($chatId)
    {
        $this->chatId = $chatId;
    }
}
