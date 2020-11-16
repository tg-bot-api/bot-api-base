<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnpinChatMessageMethod;

class UnpinChatMessageMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $method = UnpinChatMessageMethod::create('chat_id', ['messageId' => 1]);

        static::assertEquals('chat_id', $method->chatId);
        static::assertEquals(1, $method->messageId);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(UnpinChatMessageMethod $method, array $exceptedRequest)
    {
        $botApi = $this->getBot('unpinChatMessage', $exceptedRequest, true);

        $botApi->unpinChatMessage($method);
    }

    public function provideData()
    {
        return [
            'default case' => [
                UnpinChatMessageMethod::create('chat_id'),
                ['chat_id' => 'chat_id'],
            ],
            'with message id case' => [
                UnpinChatMessageMethod::create('chat_id', ['messageId' => 1]),
                ['chat_id' => 'chat_id', 'message_id' => 1],
            ],
        ];
    }
}
