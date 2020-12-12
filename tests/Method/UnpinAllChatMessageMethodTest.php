<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnpinAllChatMessageMethod;

class UnpinAllChatMessageMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $method = UnpinAllChatMessageMethod::create('chat_id');

        static::assertEquals('chat_id', $method->chatId);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(UnpinAllChatMessageMethod $method, array $exceptedRequest): void
    {
        $botApi = $this->getBot('unpinAllChatMessage', $exceptedRequest, true);

        $botApi->unpinAllChatMessage($method);
    }

    public function provideData()
    {
        return [
            'default case' => [
                UnpinAllChatMessageMethod::create('chat_id'),
                ['chat_id' => 'chat_id'],
            ],
        ];
    }
}