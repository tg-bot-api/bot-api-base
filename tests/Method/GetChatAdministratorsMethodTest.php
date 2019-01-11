<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;

class GetChatAdministratorsMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getChatAdministrators', ['chat_id' => 1]);

        $botApi->getChatAdministrators(GetChatAdministratorsMethod::create(1));
    }
}
