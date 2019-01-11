<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;

class SetChatDescriptionMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'setChatDescription',
            ['chat_id' => 'chat_id', 'description' => 'description'],
            true
        );

        $botApi->setChatDescription(SetChatDescriptionMethod::create('chat_id', ['description' => 'description']));
    }
}
