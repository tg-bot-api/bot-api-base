<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SendChatActionMethod;

class SendChatActionMethodTest extends MethodTestCase
{
    public function testEncode()
    {
        $botApi = $this->getBot('sendChatAction', [
            'chat_id' => 'chat_id',
            'action' => SendChatActionMethod::ACTION_FIND_LOCATION,
        ], true);

        $botApi->sendChatAction(SendChatActionMethod::create(
            'chat_id',
            SendChatActionMethod::ACTION_FIND_LOCATION
        ));
    }
}
