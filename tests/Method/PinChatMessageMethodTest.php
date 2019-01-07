<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\PinChatMessageMethod;

class PinChatMessageMethodTest extends MethodTestCase
{
    public function testEncode()
    {
        $botApi = $this->getBot('pinChatMessage', [
            'chat_id' => 'chat_id',
            'message_id' => 1,
            'disable_notification' => true,
        ], true);

        $botApi->pinChatMessage(PinChatMessageMethod::create(
            'chat_id',
            1,
            ['disableNotification' => true]
        ));
    }
}
