<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\DeleteMessageMethod;

class DeleteMessageMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('deleteMessage', ['chat_id' => 'chat_id', 'message_id' => 1], true);

        $botApi->deleteMessage(DeleteMessageMethod::create('chat_id', 1));
    }
}
