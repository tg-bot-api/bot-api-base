<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatTitleMethod;

class SetChatTitleMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'setChatTitle',
            ['chat_id' => 'chat_id', 'title' => 'title'],
            true
        );

        $botApi->setChatTitle(SetChatTitleMethod::create('chat_id', 'title'));
    }
}
