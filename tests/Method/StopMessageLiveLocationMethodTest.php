<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\StopMessageLiveLocationMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;

class StopMessageLiveLocationMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('stopMessageLiveLocation', [
            'chat_id' => 'chat_id',
            'message_id' => 1,
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], true, ['reply_markup']);

        $botApi->stopMessageLiveLocation(StopMessageLiveLocationMethod::create('chat_id', 1, [
            'replyMarkup' => $this->buildInlineMarkupObject(),
        ]));
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline()
    {
        $botApi = $this->getBot('stopMessageLiveLocation', [
            'inline_message_id' => 'message_id',
            'reply_markup' => $this->buildInlineMarkupArray(),
        ], true, ['reply_markup']);

        $botApi->stopMessageLiveLocation(StopMessageLiveLocationMethod::createInline('message_id', [
            'replyMarkup' => $this->buildInlineMarkupObject(),
        ]));
    }
}
