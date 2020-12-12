<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\UnbanChatMemberMethod;

class UnbanChatMemberMethodTest extends MethodTestCase
{
    public function testCreate(): void
    {
        $method = UnbanChatMemberMethod::create('chat_id', 1, ['onlyIfBanned' => true]);

        static::assertEquals('chat_id', $method->chatId);
        static::assertEquals(1, $method->userId);
        static::assertTrue($method->onlyIfBanned);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(UnbanChatMemberMethod $method, array $expectedRequest): void
    {
        $botApi = $this->getBot('unbanChatMember', $expectedRequest, true);

        $botApi->unbanChatMember($method);
    }

    public function provideData(): array
    {
        return [
            'default case' => [
                UnbanChatMemberMethod::create('chat_id', 1),
                ['chat_id' => 'chat_id', 'user_id' => 1],
            ],
            'onlyIf BannedCase' => [
                UnbanChatMemberMethod::create('chat_id', 1, ['onlyIfBanned' => true]),
                ['chat_id' => 'chat_id', 'user_id' => 1, 'only_if_banned' => true],
            ],
        ];
    }
}
