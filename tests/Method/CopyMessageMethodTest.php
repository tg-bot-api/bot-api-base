<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\CopyMessageMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\MessageEntityType;
use TgBotApi\BotApiBase\Type\ReplyKeyboardMarkupType;

class CopyMessageMethodTest extends MethodTestCase
{
    use ReplyKeyboardMarkupTrait;

    public function testCreate(): void
    {
        $method = CopyMessageMethod::create(1, 2, 3, [
            'caption' => 'caption',
            'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
            'disableNotification' => true,
            'replyToMessageId' => 0,
            'replyMarkup' => static::buildReplyMarkupObject(),
        ]);

        static::assertEquals(1, $method->chatId);
        static::assertEquals(2, $method->fromChatId);
        static::assertEquals(3, $method->messageId);
        static::assertEquals('caption', $method->caption);
        static::assertEquals('MarkdownV2', $method->parseMode);
        static::assertTrue($method->disableNotification);
        static::assertEquals(0, $method->replyToMessageId);
        static::assertInstanceOf(ReplyKeyboardMarkupType::class, $method->replyMarkup);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(CopyMessageMethod $method, array $exceptedRequest, array $serializedFields): void
    {
        $botApi = $this->getBot('copyMessage', $exceptedRequest, [], $serializedFields);

        $botApi->copyMessage($method);
    }

    public function provideData()
    {
        return [
            'minimal case case' => [
                CopyMessageMethod::create(1, 1, 1),
                ['chat_id' => 1, 'from_chat_id' => 1, 'message_id' => 1],
                [],
            ],
            'with all fields' => [
                CopyMessageMethod::create(1, 1, 1, [
                    'caption' => 'caption',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
                    'disableNotification' => true,
                    'replyToMessageId' => 0,
                    'allowSendingWithoutReply' => true,
                    'replyMarkup' => static::buildReplyMarkupObject(),
                    'captionEntities' => [MessageEntityType::create(MessageEntityType::TYPE_PRE, 0, 1)],
                ]),
                [
                    'chat_id' => 1,
                    'from_chat_id' => 1,
                    'message_id' => 1,
                    'caption' => 'caption',
                    'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
                    'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                    'disable_notification' => true,
                    'reply_to_message_id' => 0,
                    'allow_sending_without_reply' => true,
                    'reply_markup' => static::buildReplyMarkupArray(),
                ],
                ['reply_markup'],
            ],
        ];
    }
}
