<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\KickChatMemberMethod;

/**
 * Class KickChatMemberMethodTest.
 */
class KickChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \Exception
     */
    public function testEncode()
    {
        $dateTime = new \DateTimeImmutable();
        $botApi = $this->getBot('kickChatMember', [
            'chat_id' => 1,
            'user_id' => 1,
            'until_date' => $dateTime->format('U'),
        ], true);

        $botApi->kickChatMember(KickChatMemberMethod::create(1, 1, ['untilDate' => $dateTime]));
    }
}
