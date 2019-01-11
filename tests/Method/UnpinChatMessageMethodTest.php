<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnpinChatMessageMethod;

class UnpinChatMessageMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('unpinChatMessage', ['chat_id' => 'chat_id'], true);

        $botApi->unpinChatMessage(UnpinChatMessageMethod::create('chat_id'));
    }
}
