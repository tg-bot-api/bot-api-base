<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatMembersCountMethod;

class GetChatMembersCountMethodTest extends MethodTestCase
{
    public function testEncode()
    {
        $botApi = $this->getBot('getChatMembersCount', ['chat_id' => 'chat_id'], 1);

        $botApi->getChatMembersCount(GetChatMembersCountMethod::create('chat_id'));
    }
}
