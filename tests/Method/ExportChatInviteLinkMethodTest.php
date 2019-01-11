<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\ExportChatInviteLinkMethod;

class ExportChatInviteLinkMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('exportChatInviteLink', ['chat_id' => 1], 'link');

        $botApi->exportChatInviteLink(ExportChatInviteLinkMethod::create(1));
    }
}
