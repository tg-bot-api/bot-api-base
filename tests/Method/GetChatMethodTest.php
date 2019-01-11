<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatMethod;

class GetChatMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getChat', ['chat_id' => 'chat_id']);

        $botApi->getChat(GetChatMethod::create('chat_id'));
    }
}
