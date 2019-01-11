<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnbanChatMemberMethod;

class UnbanChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('unbanChatMember', ['chat_id' => 'chat_id', 'user_id' => 1], true);

        $botApi->unbanChatMember(UnbanChatMemberMethod::create('chat_id', 1));
    }
}
