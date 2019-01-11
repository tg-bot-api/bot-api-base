<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\LeaveChatMethod;

class LeaveChatMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('leaveChat', ['chat_id' => 'chat_id'], true);

        $botApi->leaveChat(LeaveChatMethod::create('chat_id'));
    }
}
