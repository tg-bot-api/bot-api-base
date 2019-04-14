<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

class ForwardMessageMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws BadArgumentException
     * @throws ResponseException
     */
    public function testEncode(): void
    {
        $botApi = $this->getBot(
            'forwardMessage',
            [
                'chat_id' => 'chat_id',
                'from_chat_id' => 'chat_id',
                'message_id' => 1,
                'disable_notification' => true,
            ]
        );

        $botApi->forwardMessage(ForwardMessageMethod::create(
            'chat_id',
            'chat_id',
            1,
            ['disableNotification' => true]
        ));
    }
}
