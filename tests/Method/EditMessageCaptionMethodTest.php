<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageCaptionMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;

class EditMessageCaptionMethodTest extends MethodTestCase
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

                'caption' => 'caption',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageCaptionMethod::create(
                'chat_id',
                1,
                [
                    'caption' => 'caption',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,

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
                'caption' => 'caption',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageCaptionMethod::createInline(
                'inline_message_id',
                [
                    'caption' => 'caption',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @param array                    $excepted
     * @param EditMessageCaptionMethod $actual
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    private function queryApi(array $excepted, EditMessageCaptionMethod $actual)
    {
        $this->getBot(
            'editMessageCaption',
            $excepted,
            [],
            ['reply_markup']
        )->editMessageCaption($actual);
    }
}
