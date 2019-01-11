<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageReplyMarkupMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;

class EditMessageReplyMarkupMethodTest extends MethodTestCase
{
    use ReplyKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->queryApi(
            [
                'chat_id' => 'chat_id',
                'message_id' => 1,
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageReplyMarkupMethod::create(
                'chat_id',
                1,
                [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline()
    {
        $this->queryApi(
            [
                'inline_message_id' => 'inline_message_id',
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageReplyMarkupMethod::createInline(
                'inline_message_id',
                [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @param array                        $excepted
     * @param EditMessageReplyMarkupMethod $actual
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    private function queryApi(array $excepted, EditMessageReplyMarkupMethod $actual)
    {
        $this->getBot(
            'editMessageReplyMarkup',
            $excepted,
            true,
            ['reply_markup']
        )->editMessageReplyMarkup($actual);
    }
}
