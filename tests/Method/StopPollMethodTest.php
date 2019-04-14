<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\StopPollMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

class StopPollMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws BadArgumentException
     * @throws ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot(
            'stopPoll',
            ['chat_id' => 'chat_id', 'message_id' => 1, 'reply_markup' => $this->buildInlineMarkupArray()],
            [],
            ['reply_markup']
        );

        $botApi->stopPoll(StopPollMethod::create(
            'chat_id',
            1,
            ['replyMarkup' => $this->buildInlineMarkupObject()]
        ));
    }
}
