<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class GetChatAdministratorsMethod
 * @link https://core.telegram.org/bots/api#getchatadministrators
 */
class GetChatAdministratorsMethod
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
