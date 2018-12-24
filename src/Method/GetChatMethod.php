<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatMethod
 * @link https://core.telegram.org/bots/api#getchat
 */
class GetChatMethod
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
