<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\SetChatAdministratorCustomTitleMethod;

class SetChatAdministratorCustomTitleMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBotWithFiles(
            'setChatAdministratorCustomTitle',
            ['chat_id' => 'chat_id', 'user_id' => 1, 'custom_title' => 'Custom title'],
            [],
            [],
            true
        );

        $botApi->setChatAdministrator(SetChatAdministratorCustomTitleMethod::create(
            'chat_id',
            1,
            'Custom title'
        ));
    }
}
