<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatMemberMethod;

class GetChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getChatMember', ['chat_id' => 'chat_id', 'user_id' => 1]);

        $botApi->getChatMember(GetChatMemberMethod::create('chat_id', 1));
    }
}
