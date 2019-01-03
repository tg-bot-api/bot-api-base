<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\ChatIdVariableTrait;

/**
 * Class ExportChatInviteLinkMethod.
 *
 * @see https://core.telegram.org/bots/api#exportchatinvitelink
 */
class ExportChatInviteLinkMethod
{
    use ChatIdVariableTrait;

    /**
     * @param int|string $chatId
     *
     * @return ExportChatInviteLinkMethod
     */
    public function create($chatId): ExportChatInviteLinkMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;

        return $instance;
    }
}
