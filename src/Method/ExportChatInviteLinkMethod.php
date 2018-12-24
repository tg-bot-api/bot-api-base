<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class ExportChatInviteLinkMethod
 * @link https://core.telegram.org/bots/api#exportchatinvitelink
 */
class ExportChatInviteLinkMethod
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
