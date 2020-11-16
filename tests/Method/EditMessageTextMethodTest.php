<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageTextMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\MessageEntityType;

class EditMessageTextMethodTest extends MethodTestCase
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
                'text' => 'text',
                'entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],

                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_web_page_preview' => true,
                'reply_markup' => static::buildReplyMarkupArray(),
            ],
            EditMessageTextMethod::create(
                'chat_id',
                1,
                'text',
                [
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disableWebPagePreview' => true,
                    'replyMarkup' => static::buildReplyMarkupObject(),
                    'entities' => [MessageEntityType::create(MessageEntityType::TYPE_PRE, 0, 1)],
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
                'text' => 'text',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'disable_web_page_preview' => true,
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageTextMethod::createInline(
                'inline_message_id',
                'text',
                [
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disableWebPagePreview' => true,
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    private function queryApi(array $excepted, EditMessageTextMethod $actual)
    {
        $this->getBot(
            'editMessageText',
            $excepted,
            true,
            ['reply_markup']
        )->editMessageText($actual);
    }
}
