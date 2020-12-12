<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnpinAllChatMessagesMethod;

class UnpinAllChatMessagesMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $method = UnpinAllChatMessagesMethod::create('chat_id');

        static::assertEquals('chat_id', $method->chatId);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(UnpinAllChatMessagesMethod $method, array $exceptedRequest): void
    {
        $botApi = $this->getBot('unpinAllChatMessages', $exceptedRequest, true);

        $botApi->unpinAllChatMessages($method);
    }

    public function provideData()
    {
        return [
            'default case' => [
                UnpinAllChatMessagesMethod::create('chat_id'),
                ['chat_id' => 'chat_id'],
            ],
        ];
    }
}
