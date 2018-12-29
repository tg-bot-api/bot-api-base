<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\Method\KickChatMemberMethod;

/**
 * Class KickChatMemberMethodTest.
 */
class KickChatMemberMethodTest extends MethodTestCase
{
    /**
     * @throws \Greenplugin\TelegramBot\Exception\ResponseException
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

        $botApi->kickChatMember(new KickChatMemberMethod(1, 1, ['untilDate' => $dateTime]));
    }
}
